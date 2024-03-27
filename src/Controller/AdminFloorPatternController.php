<?php

namespace App\Controller;

use index;
use DateTimeImmutable;
use App\Entity\FloorPattern;
use App\Form\FloorPatternType;
use Symfony\Component\Yaml\Yaml;
use App\Entity\FloorPatternTranslation;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FloorPatternRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/floor-pattern")
 */
class AdminFloorPatternController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_floor_pattern_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        $search = $request->request->get('search');

        if(is_null($search)){
            $floorPatterns = $entityManager->getRepository(FloorPattern::class)->findAll();
        }else{
            $floorPatterns = $entityManager->getRepository(FloorPattern::class)->search($search);
        }

        $pagination = $paginator->paginate(
            $floorPatterns, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );


        // $floorPatterns = $entityManager
        //     ->getRepository(FloorPattern::class)
        //     ->findAll();

        return $this->render('admin_floor_pattern/index.html.twig', [
            'floor_patterns' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_floor_pattern_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $floorPattern = new FloorPattern();
        $form = $this->createForm(FloorPatternType::class, $floorPattern);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $floorPatternData = $request->request->all()['floor_pattern'];
            // dd($form);
            $floorPattern->setCreatedAt(new DateTimeImmutable());
            $floorPattern->setUpdatedAt(new DateTimeImmutable());
            foreach ($floorPatternData as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $locale = substr($key, -2);
                    $translation = new FloorPatternTranslation();
                    $translation->setFloorPattern($floorPattern);
                    $translation->setLocale($locale);
                    $translation->setName($value["name"]);
                    $translation->setDescription($value["description"]);
                    $entityManager->persist($translation);
                    // $entityManager->flush();
                }
            }
            $entityManager->persist($floorPattern);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_floor_pattern_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor_pattern/new.html.twig', [
            'floor_pattern' => $floorPattern,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_pattern_show", methods={"GET"})
     */
    public function show(FloorPattern $floorPattern): Response
    {
        return $this->render('admin_floor_pattern/show.html.twig', [
            'floor_pattern' => $floorPattern,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_floor_pattern_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FloorPattern $floorPattern, EntityManagerInterface $entityManager): Response
    {
        // Read yaml and get all languages
        $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        $locales = $value["framework"]["translator"]["enabled_locales"];
        $floorPattern->setLocales($locales);
        //
        $form = $this->createForm(FloorPatternType::class, $floorPattern, ["edition"=>false]);
        foreach($floorPattern->getTranslations() as $t){
            $form->get('translation_'.$t->getLocale())->setData($t);
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_floor_pattern_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor_pattern/edit.html.twig', [
            'floor_pattern' => $floorPattern,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_pattern_delete", methods={"POST"})
     */
    public function delete(Request $request, FloorPattern $floorPattern, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$floorPattern->getId(), $request->request->get('_token'))) {
            $entityManager->remove($floorPattern);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_floor_pattern_index', [], Response::HTTP_SEE_OTHER);
    }
}
