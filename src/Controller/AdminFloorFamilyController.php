<?php

namespace App\Controller;

use App\Entity\FloorFamily;
use App\Form\FloorFamilyType;
use Symfony\Component\Yaml\Yaml;
use App\Entity\FloorFamilyTranslation;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FloorFamilyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/floor-family")
 */
class AdminFloorFamilyController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_floor_family_index", methods={"GET", "POST"})
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginatior): Response
    {
        $search = $request->request->get('search');

        if(is_null($search)){
            $floorFamilies = $entityManager->getRepository(FloorFamily::class)->findAll();
        }else{
            $floorFamilies = $entityManager->getRepository(FloorFamily::class)->search($search);
        }

        $pagination = $paginatior->paginate(
            $floorFamilies, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );



        return $this->render('admin_floor_family/index.html.twig', [
            'floor_families' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_floor_family_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, CategoryRepository $categoryRepository): Response
    {
        $floorFamily = new FloorFamily();
        $form = $this->createForm(FloorFamilyType::class, $floorFamily);
        $form->handleRequest($request);
        $flooring = $categoryRepository->findOneByImmutableSlug('flooring');
        if ($form->isSubmitted() && $form->isValid()) {
            $floorFam_data = $request->request->all()['floor_family'];
            $floorFamily->setCreatedAt(new \DateTimeImmutable());
            $floorFamily->setCategory($flooring);
            $entityManager->persist($floorFamily);
            $entityManager->flush();

            $floorFam_id = $floorFamily->getId();
            foreach ($floorFam_data as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $locale = substr($key, -2);
                    $translation = new FloorFamilyTranslation();
                    $translation->setFloorFamily($entityManager->getReference(FloorFamily::class, $floorFam_id));

                    $translation->setLocale($locale);
                    $translation->setDescription($value["description"]);
                    $entityManager->persist($translation);
                    $entityManager->flush();
                }
            }

            return $this->redirectToRoute('app_admin_floor_family_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor_family/new.html.twig', [
            'floor_family' => $floorFamily,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_family_show", methods={"GET"})
     */
    public function show(FloorFamily $floorFamily): Response
    {
        return $this->render('admin_floor_family/show.html.twig', [
            'floor_family' => $floorFamily,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_floor_family_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FloorFamily $floorFamily, EntityManagerInterface $entityManager): Response
    {
        // $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        // $locales = $value["framework"]["translator"]["enabled_locales"];
        // $floorFamily->setLocales($locales);
        //
        //
        $form = $this->createForm(FloorFamilyType::class, $floorFamily);
        foreach($floorFamily->getTranslations() as $t){
            $form->get('translation_'.$t->getLocale())->setData($t);
        }
        $form->handleRequest($request);
        //
        if ($form->isSubmitted() && $form->isValid()) {
            $floor_family_data = $request->request->all()['floor_family'];
            $floorFamily->setUpdatedAt(new \DateTimeImmutable());
            foreach ($floor_family_data as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $locale = substr($key, -2);
                    $translation = $entityManager->getRepository(FloorFamilyTranslation::class)->findOneBy([
                        'floorFamily' => $floorFamily,
                        'locale' => $locale,
                    ]);
                    $translation->setDescription($floor_family_data[$key]['description']);
                    $entityManager->persist($translation);
                }
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_floor_family_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor_family/edit.html.twig', [
            'floor_family' => $floorFamily,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_family_delete", methods={"POST"})
     */
    public function delete(Request $request, FloorFamily $floorFamily, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$floorFamily->getId(), $request->request->get('_token'))) {
            $entityManager->remove($floorFamily);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_floor_family_index', [], Response::HTTP_SEE_OTHER);
    }
}
