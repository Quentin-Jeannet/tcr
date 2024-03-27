<?php

namespace App\Controller;

use App\Entity\Color;
use DateTimeImmutable;
use App\Form\Color2Type;
use App\Entity\ColorFamily;
use App\Entity\ColorTranslation;
use Symfony\Component\Yaml\Yaml;
use App\Repository\ColorRepository;
use App\Repository\PhotoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ColorTranslationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/admin/color")
 */
class AdminColorController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_color_index", methods={"GET", "POST"})
     */
    public function index(ColorRepository $colorRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $search = $request->request->get('search');
        //
        if(is_null($search)){
            $colors = $colorRepository->findAll();
        }else{
            $colors = $colorRepository->search($search);
        }
        // Pagination
        $pagination = $paginator->paginate(
            $colors , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );

        return $this->render('admin_color/index.html.twig', [
            'colors' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_color_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        $filesystem = new Filesystem();

        // Read yaml and get all languages
        
        $color = new Color();
        // $color->setLocales($locales);
        $form = $this->createForm(Color2Type::class, $color);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hex = $color->getHexadecimal1();
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            // dd($form->getData(), $r, $g, $b);
            // $sizes = getimagesize($form->getData()->getPhotos()[0]->getImageFile());
            // $width = $sizes[0];
            // $height = $sizes[1];
            // $ratio = $width / $height;

            // dd($ratio);
            
            $color->setRedFromRGBA($r);
            $color->setGreenFromRGBA($g);
            $color->setBlueFromRGBA($b);
            

            $color -> setCreatedAt(new DateTimeImmutable());
            $entityManager->persist($color);
            $entityManager->flush();

            $color_id = $color->getId();
            foreach ($color as $key => $value) {
                if (str_contains($key, 'translation')) {
                    $lang = substr($key, -2);
                    $translation = new ColorTranslation();
                    $translation->setColor($entityManager->getReference(Color::class, $color_id));

                    $translation->setLocale($lang);
                    $translation->setDescription($value["description"]);
                    $entityManager->persist($translation);
                    $entityManager->flush();
                }
            }
            $entityManager->persist($color);
            $entityManager->flush();
            // Message flash
            $this->addFLash('success', $translatorInterface->trans("back.message.colorAddSuccess"));
            return $this->redirectToRoute('app_admin_color_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_color/new.html.twig', [
            'color' => $color,
            'form' => $form,
            // 'langs' => $color->getLocales(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_color_show", methods={"GET"})
     */
    public function show(Color $color): Response
    {   
        $filesystem = new Filesystem();

        // Read yaml and get all languages
        $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        $locales = $value["framework"]["translator"]["enabled_locales"];
        return $this->render('admin_color/show.html.twig', [
            'color' => $color,
            'locales' => $locales,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_color_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Color $color, $id, ColorTranslationRepository $colorTranslationRepository, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        $filesystem = new Filesystem();

        // Read yaml and get all languages
        $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        $locales = $value["framework"]["translator"]["enabled_locales"];
        $color->setLocales($locales);

        $form = $this->createForm(Color2Type::class, $color);
        foreach($color->getTranslations() as $t){
            $form->get('translation_'.$t->getLocale())->setData($t);
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $color->setUpdatedAt(new DateTimeImmutable());
            $entityManager->persist($color);
            $entityManager->flush();
            // Message flash
            $this->addFLash('success', $translatorInterface->trans("back.message.colorEditSuccess"));
            return $this->redirectToRoute('app_admin_color_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_color/edit.html.twig', [
            'color' => $color,
            'form' => $form,
            'langs' => $color->getLocales(),
        ]);
    }


    /**
     * @Route("/{id}", name="app_admin_color_delete", methods={"POST"})
     */
    public function delete(Request $request, Color $color, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        if ($this->isCsrfTokenValid('delete'.$color->getId(), $request->request->get('_token'))) {
            // dump($color);
                foreach($color->getColorFamilies() as $col){
                    $cf_id = $col->getId();
                $color->removeColorFamily($entityManager->getReference(ColorFamily::class, $cf_id));
            }
            // die;
            $entityManager->remove($color);
            // Message flash
            $this->addFLash('success', $translatorInterface->trans("back.message.colorDeleteSuccess"));
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_color_index', [], Response::HTTP_SEE_OTHER);
    }
      /**
        * @Route("/removephoto/{id}/{idColor}", name="remove-photo-color")
        */
        public function removePhoto(int $id, int $idColor, Request $request, ColorRepository $colorRepository, PhotoRepository $photoRepository, EntityManagerInterface $entityManagerInterface): Response
        {
             $color = $colorRepository->findOneById($idColor);
             $photo = $photoRepository->findOneById($id);
             $color->removePhoto($photo);
             $entityManagerInterface->persist($color);
             $entityManagerInterface->flush();
             $referer = $request->headers->get('referer');  
                 $this -> addFlash('success', 'The photo has been deleted');
                 return new RedirectResponse($referer);
        }
}
