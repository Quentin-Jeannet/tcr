<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Goodies;
use App\Form\GoodiesType;
use Symfony\Component\Yaml\Yaml;
use App\Entity\GoodiesTranslation;
use App\Repository\GoodiesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GoodiesTranslationRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/admin/goodies")
 */
class AdminGoodiesController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_goodies_index", methods={"GET", "POST"})
     */
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $search = $request->request->get('search');
        // SELECTION
        if(is_null($search)){
            $goodies = $entityManager->getRepository(Goodies::class)->findAll();
        }else{
            $goodies = $entityManager->getRepository(Goodies::class)->search($search);
        }
        // PAGINATION
        $pagination = $paginator->paginate(
            $goodies , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );
        // RENDER
        return $this->render('admin_goodies/index.html.twig', [
            'goodies' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_goodies_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        $goody = new Goodies();
        $form = $this->createForm(GoodiesType::class, $goody);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $goody_data = $request->request->all()['goodies'];
            $goody->setCreatedAt(new DateTimeImmutable());
            $goody->setUpdatedAt(null);
            $entityManager->persist($goody);
            $entityManager->flush();

            $goody_id = $goody->getId();
            // dd($article_id);
            foreach ($goody_data as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $lang = substr($key, -2);
                    $translation = new GoodiesTranslation();
                    $translation->setGoodies($entityManager->getReference(Goodies::class, $goody_id));

                    $translation->setLocale($lang);
                    $translation->setText($value["text"]);
                    $translation->setDescription($value["description"]);
                    $entityManager->persist($translation);
                    $entityManager->flush();
                }
            }
            // Message flash
            $this->addFLash('success', $translatorInterface->trans("back.message.goodyAddSuccess"));
            return $this->redirectToRoute('app_admin_goodies_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_goodies/new.html.twig', [
            'goody' => $goody,
            'form' => $form,
            'langs' => $goody->getLocales(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_goodies_show", methods={"GET"})
     */
    public function show(Goodies $goody): Response
    {
        return $this->render('admin_goodies/show.html.twig', [
            'goody' => $goody,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_goodies_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request,$id, Goodies $goody, GoodiesTranslationRepository $goodiesTranslationRepository, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        $form = $this->createForm(GoodiesType::class, $goody);
        foreach($goody->getTranslations() as $t){
            $form->get('translation_'.$t->getLocale())->setData($t);
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $goody->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();
            // Message flash
            $this->addFLash('success', $translatorInterface->trans("back.message.goodyEditSuccess"));
            return $this->redirectToRoute('app_admin_goodies_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_goodies/edit.html.twig', [
            'goody' => $goody,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_goodies_delete", methods={"POST"})
     */
    public function delete(Request $request, Goodies $goody, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        if ($this->isCsrfTokenValid('delete'.$goody->getId(), $request->request->get('_token'))) {
            $entityManager->remove($goody);
            // Message flash
            $this->addFLash('success', $translatorInterface->trans("back.message.goodyDeleteSuccess"));
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_goodies_index', [], Response::HTTP_SEE_OTHER);
    }
    /**
     * @Route("/removeimage/{id}", name="remove-image")
     */
    public function removeImage(int $id, Request $request, GoodiesRepository $goodiesRepository, EntityManagerInterface $entityManagerInterface): Response
    {
        $goody = $goodiesRepository->findById($id);
        $goody[0]->setImageName(null);
        $entityManagerInterface->persist($goody[0]);
        $entityManagerInterface->flush();
        $referer = $request->headers->get('referer');
        $this->addFlash('success', 'La photo a été supprimée');
        return new RedirectResponse($referer);
    }
}
