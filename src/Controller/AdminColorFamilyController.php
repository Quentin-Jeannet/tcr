<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\ColorFamily;
use App\Form\ColorFamilyType;
use Symfony\Component\Yaml\Yaml;
use App\Entity\ColorFamilyTranslation;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ColorFamilyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ColorFamilyTranslationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/color-family")
 */
class AdminColorFamilyController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_color_family_index", methods={"GET", "POST"})
     */
    public function index(ColorFamilyRepository $colorFamilyRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $search = $request->request->get('search');
        //
        if(is_null($search)){
            $colorFamilies = $colorFamilyRepository->findAll();
        }else{
            $colorFamilies = $colorFamilyRepository->search($search);
        }

        // Pagination
        $pagination = $paginator->paginate(
            $colorFamilies , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );

        return $this->render('admin_color_family/index.html.twig', [
            'colorFamilies' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_color_family_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $colorFamily = new ColorFamily();
        $form = $this->createForm(ColorFamilyType::class, $colorFamily);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $colFam_data = $request->request->all()['color_family'];
            $colorFamily->setCreatedAt(new DateTimeImmutable());
            $entityManager->persist($colorFamily);
            $entityManager->flush();

            $colFam_id = $colorFamily->getId();
            foreach ($colFam_data as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $locale = substr($key, -2);
                    $translation = new ColorFamilyTranslation();
                    $translation->setColorFamily($entityManager->getReference(ColorFamily::class, $colFam_id));

                    $translation->setLocale($locale);
                    $translation->setText($value["text"]);
                    $entityManager->persist($translation);
                    $entityManager->flush();
                }
            }


            $entityManager->persist($colorFamily);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_color_family_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_color_family/new.html.twig', [
            'color_family' => $colorFamily,
            'form' => $form,
            'langs' => $colorFamily->getLocales(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_color_family_show", methods={"GET"})
     */
    public function show(ColorFamily $colorFamily): Response
    {
        $filesystem = new Filesystem();

        // Read yaml and get all languages
        $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        $locales = $value["framework"]["translator"]["enabled_locales"];
        return $this->render('admin_color_family/show.html.twig', [
            'color_family' => $colorFamily,
            'locales' => $locales,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_color_family_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ColorFamily $colorFamily, $id, ColorFamilyTranslationRepository $colorFamilyTranslationRepository, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ColorFamilyType::class, $colorFamily);
        foreach($colorFamily->getTranslations() as $t){
            $form->get('translation_'.$t->getLocale())->setData($t);
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $colorFamily->setUpdatedAt(new DateTimeImmutable());
            $entityManager->persist($colorFamily);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_color_family_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_color_family/edit.html.twig', [
            'color_family' => $colorFamily,
            'form' => $form,
            // 'langs' => $colorFamily->getLocales(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_color_family_delete", methods={"POST"})
     */
    public function delete(Request $request, ColorFamily $colorFamily, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $colorFamily->getId(), $request->request->get('_token'))) {
            $entityManager->remove($colorFamily);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_color_family_index', [], Response::HTTP_SEE_OTHER);
    }
}
