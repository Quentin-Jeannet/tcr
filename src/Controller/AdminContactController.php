<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/contact")
 */
class AdminContactController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_contact_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        $search = $request->request->get('search');
        //
        if(is_null($search)){
            $contacts = $entityManager->getRepository(Contact::class)->findBy(['isRead'=>false], ['id' => 'DESC']);
        }else{
            $contacts = $entityManager->getRepository(Contact::class)->search($search);
        }
        // Pagination
        $pagination = $paginator->paginate(
            $contacts , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );
      
        return $this->render('admin_contact/index.html.twig', [
            'contacts' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_contact_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_contact_show", methods={"GET"})
     */
    public function show(Contact $contact, EntityManagerInterface $entityManagerInterface): Response
    {
        $contact->setIsRead(true);
        $entityManagerInterface->persist($contact);
        $entityManagerInterface->flush();
        //
        return $this->render('admin_contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_contact_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Contact $contact, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_contact_delete", methods={"POST"})
     */
    public function delete(Request $request, Contact $contact, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_contact_index', [], Response::HTTP_SEE_OTHER);
    }

    // <span class="ms-2 badge bg-warning">0</span>
    public function getTotalUnreadContact(ContactRepository $contactRepository): Response
    {
        $total = $contactRepository->countUnreadContact();
        ($total > 0) ? $toReturn = '<span class="ms-2 badge bg-warning">'.$total.'</span>' : $toReturn = '';
        // return $toReturn;
        return new Response($toReturn);
        // return $contactRepository->countUnreadContact();
    }
}
