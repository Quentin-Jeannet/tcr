<?php

namespace App\Controller;

use App\Entity\Floor;
use App\Form\FloorType;
use App\Entity\FloorTranslation;
use Symfony\Component\Yaml\Yaml;
use App\Repository\FloorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/floor")
 */
class AdminFloorController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_floor_index", methods={"GET", "POST"})
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        $search = $request->request->get('search');

        if(is_null($search)){
            $floors = $entityManager->getRepository(Floor::class)->findAll();
        }else{
            $floors = $entityManager->getRepository(Floor::class)->search($search);
        }

        $pagination = $paginator->paginate(
            $floors, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );

        return $this->render('admin_floor/index.html.twig', [
            'floors' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_floor_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $floor = new Floor();
        $form = $this->createForm(FloorType::class, $floor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $floor->setCreatedAt(new \DateTimeImmutable());
            // $floor->setUpdatedAt(new \DateTimeImmutable());
            $entityManager->persist($floor);
            $entityManager->flush();
        
            $floorId = $floor->getId();
            foreach ($floor as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $lang = substr($key, -2);
                    $translation = new FloorTranslation();
                    $translation->setFloor($entityManager->getReference(Color::class, $floorId));
                    $translation->setLocale($lang);
                    $translation->setDescription($value["description"]);
                    $entityManager->persist($translation);
                    $entityManager->flush();
                }
            }

            return $this->redirectToRoute('app_admin_floor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor/new.html.twig', [
            'floor' => $floor,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_show", methods={"GET"})
     */
    public function show(Floor $floor): Response
    {
        return $this->render('admin_floor/show.html.twig', [
            'floor' => $floor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_floor_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Floor $floor, EntityManagerInterface $entityManager): Response
    {
        // Read yaml and get all languages
        $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        $locales = $value["framework"]["translator"]["enabled_locales"];
        $floor->setLocales($locales);

        
        $form = $this->createForm(FloorType::class, $floor, [
            'edition' => false,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $floor_data = $request->request->all()['floor'];
            $floor->setUpdatedAt(new \DateTimeImmutable());
            foreach ($floor_data as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $locale = substr($key, -2);
                    $translation = $entityManager->getRepository(FloorTranslation::class)->findOneBy(['floor' => $floor, 'locale' => $locale]);
                    if($translation == null){
                        $translation = new FloorTranslation();
                        $translation->setFloor($floor);
                        $translation->setLocale($locale);
                        $floor->addTranslation($translation);
                    }
                    $translation->setDescription($floor_data[$key]['description']);
                    $entityManager->persist($translation);
                }
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_admin_floor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor/edit.html.twig', [
            'floor' => $floor,
            'form' => $form,
            'lang' => $floor->getLocales(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_delete", methods={"POST"})
     */
    public function delete(Request $request, Floor $floor, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$floor->getId(), $request->request->get('_token'))) {
            $entityManager->remove($floor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_floor_index', [], Response::HTTP_SEE_OTHER);
    }
}
