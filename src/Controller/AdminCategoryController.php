<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Component\Yaml\Yaml;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryTranslationRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/admin/category")
 */
class AdminCategoryController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_category_index", methods={"GET", "POST"})
     */
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $search = $request->request->get('search');
        //
        if(is_null($search)){
            $categories = $entityManager->getRepository(Category::class)->findBy([], ["rankOrder"=>"ASC"]);
        }else{
            $categories = $entityManager->getRepository(Category::class)->search($search);
        }
        // Pagination
        $pagination = $paginator->paginate(
            $categories , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );

        //
        return $this->render('admin_category/index.html.twig', [
            'categories' => $pagination,
        ]);
    }
    /**
     * @Route("/switch", name="app_admin_category_switch", methods={"GET","POST"})
     */
    public function switch(EntityManagerInterface $entityManager, Request $request, SluggerInterface $slugger, TranslatorInterface $translator, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->find($request->get('id'));
        if($request->get('isMenu')== "false") {
            $category->setIsMenu(false);
        }else{
            $category->setIsMenu(true);
        }
        $category->setIsMenu($request->get('isMenu'));
        $entityManager->persist($category);
        $entityManager->flush();

        return new Response("switchOK");
    }

    /**
     * @Route("/new/", name="app_admin_category_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger, TranslatorInterface $translatorInterface): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category, ["edition"=>true]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category_data = $request->request->all()['category'];
            $category->setCreatedAt(new DateTimeImmutable());
            foreach ($category_data as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $locale = substr($key, -2);
                    $translation = $form->get("translation_".$locale)->getData(); 
                    $translation->setLocale($locale);
                    $translation->setCategory($category);
                    // Slug
                    $slug = $form->get("translation_".$locale)->get("slug")->getData();
                    $slug->setLocale($locale);
                    $slug->setCategoryTranslation($translation);
                    $slug->setText($slugger->slug($slug->getText()));
                    $translation->setSlug($slug);
                    //
                    $category->addTranslation($translation);
                    //
                    $entityManager->persist($translation);
                    $entityManager->persist($slug);
                }
                if (str_contains($key, 'seo')) {
                    $seo = $category->getSeo();
                    foreach($value as $k => $v){
                        if (str_contains($k, 'translation')) {
                            $locale = substr($k, -2);
                            $seoTranslation = $form->get("seo")->get("translation_".$locale)->getData(); 
                            $seoTranslation->setLocale($locale);
                            $seoTranslation->setSeo($seo);
                            $seo->addTranslation($seoTranslation);
                            //
                            $entityManager->persist($seoTranslation);
                        }
                    }
                }
            }
            $entityManager->persist($category);
            $entityManager->flush();
            // Message Flash
            $this->addFlash('success', $translatorInterface->trans('back.message.categoryAddSuccess'));
            return $this->redirectToRoute('app_admin_category_index', [], Response::HTTP_SEE_OTHER);
            // return new Response("ok");
        }

        return $this->renderForm('admin_category/new.html.twig', [
            'category' => $category,
            'form' => $form,
            'langs' => $category->getLocales(),
        ]);
    }
    /**
     * @Route("/remove-image-category/{id}", name="remove-image-category")
     */
    public function removeImage(int $id, Request $request, CategoryTranslationRepository $categoryTranslationRepository, EntityManagerInterface $entityManagerInterface): Response
    {
        $goody = $categoryTranslationRepository->findById($id);
        $goody[0]->setImageName(null);
        $entityManagerInterface->persist($goody[0]);
        $entityManagerInterface->flush();
        $referer = $request->headers->get('referer');
        $this->addFlash('success', 'La photo a été supprimée');
        return new RedirectResponse($referer);
    }

    /**
     * @Route("/{id}", name="app_admin_category_show", methods={"GET"})
     */
    public function show(Category $category): Response
    {
        $filesystem = new Filesystem();

        // Read yaml and get all languages
        $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        $locales = $value["framework"]["translator"]["enabled_locales"];

        return $this->render('admin_category/show.html.twig', [
            'category' => $category,
            'locales' => $locales,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_category_edit", methods={"GET", "POST"}, priority=10)
     */
    public function edit(Request $request, Category $category, $id, SluggerInterface $slugger, EntityManagerInterface $entityManager, CategoryTranslationRepository $categoryTranslationRepository, TranslatorInterface $translatorInterface): Response
    {
        $form = $this->createForm(CategoryType::class, $category, ["edition"=>false]);
        foreach($category->getTranslations() as $t){
            $form->get('translation_'.$t->getLocale())->setData($t);
        }
        if(!is_null($category->getSeo())){
            foreach($category->getSeo()->getTranslations() as $seoTranslation){
                $form->get("seo")->get('translation_'.$seoTranslation->getLocale())->setData($seoTranslation);
            }
        }
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category_data = $request->request->all()['category'];
            $category->setUpdatedAt(new DateTimeImmutable());
            foreach ($category_data as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $locale = substr($key, -2);
                    $imageFile = $form[$key]['imageFile']->getData();
                    if(!is_null($imageFile)) {
                        foreach($category->getTranslations() as $categoryTranslation){
                            if($categoryTranslation->getLocale()==$locale){
                                $categoryTranslation->setUpdatedAt(new DateTimeImmutable());
                            }
                        }
                    }
                }
            }
            $entityManager->flush();
            // Message Flash
            $this->addFlash('success', $translatorInterface->trans('back.message.categoryEditSuccess'));
            return $this->redirectToRoute('app_admin_category_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('admin_category/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_category_delete", methods={"POST"})
     */
    public function delete(Request $request, Category $category, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        if ($this->isCsrfTokenValid('delete' . $category->getId(), $request->request->get('_token'))) {
            foreach ($category->getSubCategories() as $sub) {
                $category->removeSubCategory($sub);
            }
            $entityManager->remove($category);
            $entityManager->flush();
            // Message Flash
            $this->addFlash('success', $translatorInterface->trans('back.message.categoryDeleteSuccess'));
        }

        return $this->redirectToRoute('app_admin_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
