<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\SubCategory;
use App\Form\SubCategoryType;
use Symfony\Component\Yaml\Yaml;
use App\Entity\SubCategoryTranslation;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SubCategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SubCategoryTranslationRepository;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/admin/sub-category")
 */
class AdminSubCategoryController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_sub_category_index", methods={"GET", "POST"})
     */
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $search = $request->request->get('search');
        //
        if(is_null($search)){
            $categories = $subCategories = $entityManager->getRepository(SubCategory::class)->findAll();
        }else{
            $categories = $entityManager->getRepository(SubCategory::class)->search($search);
        }
        // Pagination
        $pagination = $paginator->paginate(
            $categories , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );

        return $this->render('admin_sub_category/index.html.twig', [
            'sub_categories' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_sub_category_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface, SluggerInterface $sluggerInterface): Response
    { 
        $subCategory = new SubCategory();
        $form = $this->createForm(SubCategoryType::class, $subCategory, ["edition"=>true]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // dd($request->request->all()['sub_category']);
            $sub_data = $request->request->all()['sub_category'];
            $subCategory->setCreatedAt(new DateTimeImmutable());
            
            // $sub_id = $subCategory->getId();
            foreach ($sub_data as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $locale = substr($key, -2);
                    $translation = $form->get("translation_".$locale)->getData(); 
                    
                    $translation->setSubCategory($subCategory);
                    $translation->setLocale($locale);
                    // Prise en charge du slug
                    $slug = $translation->getSlug();
                    $slug->setlocale($locale);
                    $slug->setSubCategoryTranslation($translation);
                    $slug->setText($sluggerInterface->slug($slug->getText()));
                    $translation->setSlug($slug);
                    $subCategory->addTranslation($translation);
                    //
                    $entityManager->persist($slug);
                    $entityManager->persist($translation);
                }
            }
            $entityManager->persist($subCategory);
            $entityManager->flush();
            // Message Flash
            $this->addFlash('success', $translatorInterface->trans('back.message.subCategoryAddSuccess'));
            return $this->redirectToRoute('app_admin_sub_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_sub_category/new.html.twig', [
            'sub_category' => $subCategory,
            'form' => $form,
            'langs' => $subCategory->getLocales(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_sub_category_show", methods={"GET"})
     */
    public function show(SubCategory $subCategory): Response
    {
        $filesystem = new Filesystem();

        // Read yaml and get all languages
        $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        $locales = $value["framework"]["translator"]["enabled_locales"];
        
        return $this->render('admin_sub_category/show.html.twig', [
            'sub_category' => $subCategory,
            'locales' => $locales,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_sub_category_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SubCategory $subCategory, $id, EntityManagerInterface $entityManager, SubCategoryTranslationRepository $subCategoryTranslationRepository, TranslatorInterface $translatorInterface): Response
    {
        $form = $this->createForm(SubCategoryType::class, $subCategory, ["edition"=>false]);
        foreach($subCategory->getTranslations() as $t){
            $form->get('translation_'.$t->getLocale())->setData($t);
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $subCategoryData = $request->request->all()['sub_category'];
            $subCategory->setUpdatedAt(new DateTimeImmutable());
            
            $entityManager->flush();
            // Message Flash
            $this->addFlash('success', $translatorInterface->trans('back.message.subCategoryEditSuccess'));
            return $this->redirectToRoute('app_admin_sub_category_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('admin_sub_category/edit.html.twig', [
            'sub_category' => $subCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_sub_category_delete", methods={"POST"})
     */
    public function delete(Request $request, CategoryRepository $categoryRepository, SubCategory $subCategory, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        if ($this->isCsrfTokenValid('delete' . $subCategory->getId(), $request->request->get('_token'))) {
            foreach ($subCategory->getCategories() as $cat) {
                $subCategory->removeCategory($cat);
            }

            $entityManager->remove($subCategory);
            $entityManager->flush();
            // Message Flash
            $this->addFlash('success', $translatorInterface->trans('back.message.subCategoryDeleteSuccess'));
        }

        return $this->redirectToRoute('app_admin_sub_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
