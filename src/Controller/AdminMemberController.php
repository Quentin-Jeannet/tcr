<?php

namespace App\Controller;

use App\Entity\Member;
use App\Form\MemberType;
use App\Repository\MemberRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/member")
 */
class AdminMemberController extends AbstractController
{
    /**
     * @route("/export", name="app_admin_member_export")
     */
    public function export(MemberRepository $repository):Response
    {
        $members = $repository->findAll();
        //
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Export missions");
        $sheet->getCell('A1')->setValue('Id');
        $sheet->getCell('B1')->setValue('Email');
        // Préparation des données
        $datas = [];
        foreach ($members as $member) {
            $datas[] = [
                $member->getId(),
                $member->getEmail(),
            ];
        }
        //
        $sheet->fromArray($datas, null, 'A2', true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        // Création du fichier
        $writer = new Xlsx($spreadsheet);
        // Sauvegarde du fichier
        $finalName = "TCR-Newsletter-Subscribers";
        // $finalName = $this->normalizeChars($finalName);
        $path = 'xlsx/' . $finalName . '.xlsx';
        $writer->save($path);
        // Réponse
        return $this->redirect('/' . $path);
    }
    /**
     * @Route("/", name="app_admin_member_index", methods={"GET", "POST"})
     */
    public function index(MemberRepository $memberRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $search = $request->request->get('search');
        //
        if(is_null($search)){
            $members = $memberRepository->findAll();
        }else{
            $members = $memberRepository->search($search);
        }

        // Pagination
        $pagination = $paginator->paginate(
            $members , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );

        return $this->render('admin_member/index.html.twig', [
            'members' => $pagination,
        ]);

    }

    /**
     * @Route("/new", name="app_admin_member_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        $member = new Member();
        $form = $this->createForm(MemberType::class, $member, ["isBackend" => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($member);
            $entityManager->flush();
            // Message flash
            $this->addFLash('success', $translatorInterface->trans("back.message.newsLetterSubscriberAddSuccess"));
            return $this->redirectToRoute('app_admin_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_member/new.html.twig', [
            'member' => $member,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_member_show", methods={"GET"})
     */
    public function show(Member $member): Response
    {
        return $this->render('admin_member/show.html.twig', [
            'member' => $member,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_member_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Member $member, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        $form = $this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFLash('success', $translatorInterface->trans("back.message.newsLetterSubscriberEditSuccess"));
            return $this->redirectToRoute('app_admin_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_member/edit.html.twig', [
            'member' => $member,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_member_delete", methods={"POST"})
     */
    public function delete(Request $request, Member $member, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        if ($this->isCsrfTokenValid('delete'.$member->getId(), $request->request->get('_token'))) {
            $entityManager->remove($member);
            $entityManager->flush();
            $this->addFLash('success', $translatorInterface->trans("back.message.newsLetterSubscriberDeleteSuccess"));
        }

        return $this->redirectToRoute('app_admin_member_index', [], Response::HTTP_SEE_OTHER);
    }
}
