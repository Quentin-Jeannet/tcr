<?php

namespace App\Controller;

use App\Entity\Slug;
use App\Entity\Color;
use App\Classe\Panier;
use App\Entity\Contact;
use App\Entity\Floor;
use App\Entity\Photo;
use App\Entity\SubCategory;
use App\Form\ContactType;
use App\Repository\SlugRepository;
use App\Repository\ColorRepository;
use App\Repository\PhotoRepository;
use App\Repository\PriceRepository;
use App\Repository\FinishRepository;
use App\Repository\GoodiesRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ColorTranslationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GoodiesTranslationRepository;
use App\Repository\CategoryTranslationRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Repository\ColorFamilyTranslationRepository;
use App\Repository\FloorRepository;
use App\Repository\SubCategoryRepository;
use App\Repository\SubCategoryTranslationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class PagesController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(CategoryRepository $categoryRepository, GoodiesRepository $goodiesRepository): Response
    {
        $home = $categoryRepository->findOneByRankOrder(1);
        $goodies = $goodiesRepository->findAll();
        
        return $this->render('pages/home.html.twig', [
            'home' => $home,
        ]);
    }

    public function renderFooter(SubCategoryRepository $subCategoryRepository, SlugRepository $slugRepository, Request $request)
    {
        $locale = $request->getLocale();
        
        // Recuperation du slug local la sous categorie missions
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('missions');
        $missions = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie history
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('history');
        $history = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie about us
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('about-us');
        $aboutUs = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie safety
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('safety');
        $safety = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie transport
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('transport');
        $transport = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();


        // Recuperation du slug local la sous categorie fidbox
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('fidbox');
        $fidbox = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie maintenance
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('maintenance');
        $maintenance = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie material
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('material');
        $material = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie blog
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('blog');
        $blog = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie learn
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('learn');
        $learn = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie stores
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('stores');
        $stores = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();

        // Recuperation du slug local la sous categorie contact
        $subCategory = $subCategoryRepository->findOneByImmutableSlug('contact');
        $contact = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();




        return $this->render('pages/_footer.html.twig', [
            'missions' => $missions,
            'history' => $history,
            'aboutUs' => $aboutUs,
            'safety' => $safety,
            'transport' => $transport,
            'fidbox' => $fidbox,
            'maintenance' => $maintenance,
            'material' => $material,
            'blog' => $blog,
            'learn' => $learn,
            'stores' => $stores,
            'contact' => $contact,
        ]);
    }


    /**
     * @Route("/footer/{slugSubCategory}", name="app_footer_sub")
     */
    public function footerSub($slugSubCategory, SlugRepository $slugRepository, ColorRepository $colorRepository): Response
    {
        $slugSubCategoryObject = $slugRepository->findOneByText($slugSubCategory);
        $subCategory = $slugSubCategoryObject->getSubCategoryTranslation()->getSubCategory();
        $image = $subCategory->getImageName();
        return $this->render('pages/sub.html.twig', [
            'subCategory' => $subCategory,
            'image' => $image,
            'category' => null
        ]);
    }


    /**
     * @Route("/{slugCategory}", name="pages-category", priority=-10)
     */
    public function pagesCategory($slugCategory,SlugRepository $slugRepository, ColorRepository $colorRepository, Request $request, EntityManagerInterface $entityManagerInterface, TranslatorInterface $translatorInterface, FloorRepository $floorRepository): Response
    {

        $slug = $slugRepository->findByTextCategory($slugCategory);
        $category = $slug->getCategoryTranslation()->getCategory();
        switch($category->getImmutableSlug())
        {
            case 'home':
                return $this->render('pages/home.html.twig', [
                    'home' => $category,
                    'slugCategory' => $slugCategory,
                ]);
                break;
            case 'paint':
                $colors = $colorRepository->getColorsByCategory($category->getId());
                return $this->render('pages/category.html.twig', [
                    'category' => $category,
                    'colors' => $colors,
                    'slugCategory' => $slugCategory,
                ]);
                break;
            case 'flooring':
                $floors = $floorRepository->findByIsActiveTrue();
                return $this->render('pages/category.html.twig', [
                    'category' => $category,
                    'floors' => $floors,
                    'slugCategory' => $slugCategory,
                ]);
                break;
            case 'goodies':
                $goodies = $category->getGoodies();
                return $this->render('pages/category.html.twig', [
                    'category' => $category,
                    'goodies' => $goodies,
                    'slugCategory' => $slugCategory,

                ]);
                break;
            case 'contact':
                $contact = new Contact();
                $form = $this->createForm(ContactType::class, $contact);
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $contact->setIsRead(false);
                    $contact->setCreatedAt(new \DateTimeImmutable());
                    $entityManagerInterface->persist($contact);
                    $entityManagerInterface->flush();
                    $this->addFlash('success', $translatorInterface->trans('front.contact.success'));
                    // Redirect to referer
                    $referer = $request->headers->get('referer');
                    return $this->redirect($referer);

                }
                return $this->render('pages/category.html.twig', [
                    'category' => $category,
                    'slugCategory' => $slugCategory,
                    'form' => $form->createView(),
                    'contact' => $contact,
                ]);
                break;
            case 'configurator':
                $configurator = true;
                return $this->render('pages/category.html.twig', [
                    'category' => $category,
                    'configurator' => $configurator,
                    'slugCategory' => $slugCategory,

                ]);
                break;

            default:
                return $this->render('pages/category.html.twig', [
                    'category' => $category,
                    'slugCategory' => $slugCategory,
                ]);
                break;
        }
    }


    /**
     * @Route("/{slugCategory}/{id<\d+>}", name="app_detail", priority=-10)
     */
    public function detail($id, $slugCategory, SlugRepository $slugRepository, FinishRepository $finishRepository, PhotoRepository $photoRespository, ColorRepository $colorRepository, FloorRepository $floorRepository): Response
    {
        $nbImagesMax = 12;
        $slug = $slugRepository->findOneByText($slugCategory);
        $category = $slug->getCategoryTranslation()->getCategory();
        $immutableSlug = $category->getImmutableSlug();
        switch($immutableSlug)
        {
            case 'paint':
                $color = $colorRepository->find($id);
                $photos = $color->getPhotos()->getValues();
                $finishes = $finishRepository->findAll();
                // $associatedMapped = $color->getAssociatedColors()->getValues();
                $associatedColors = $color->getColors()->getValues();
                // $associatedColors = array_unique(array_merge($associatedInversed, $associatedMapped));
                $otherPhotos = $photoRespository->findOtherColorPhotos();
                $photos = $this->maconeriePhoto($photos, $otherPhotos, $nbImagesMax, $associatedColors, $photoRespository);


                return $this->render('pages/colorDetail.html.twig', [
                        'color' => $color,
                        'finishes' => $finishes,
                        'category' => $category,
                        'photos' => $photos,
                        'associatedColors' => $associatedColors,
                    ]);
                break;
            case 'flooring':
                $floor = $floorRepository->find($id);
                $photos = $floor->getPhotos()->getValues();
                $otherPhotos = $photoRespository->findOtherFloorPhotos();
                $photos= $this->maconeriePhoto($photos, $otherPhotos, $nbImagesMax, null, $photoRespository);



                return $this->render('pages/floorDetail.html.twig', [
                        'floor' => $floor,
                        'category' => $category,
                        'photos' => $photos,
                    ]);
                break;
            case 'goodies':
                $goody = $colorRepository->find($id);
                $photos = $goody->getPhotos()->getValues();
                break;
            default:
                $photos = [];
                break;
        }

    }

    public function maconeriePhoto($photos, $otherPhotos,$nbImagesMax, $colors, PhotoRepository $photoRepository)
    {
        //Old block maconerie

        // $diff = (count($photos) - $nbImagesMax);

        // if (count($photos) > $nbImagesMax) {
        //     for ($i = 0; $i < $diff; $i++) {
        //         shuffle($photos);
        //         unset($photos[0]);
        //     }
        // }

        // if($colors != null){
        //     if (count($photos) < $nbImagesMax){
        //         $associatedPhotos = [];
        //         foreach ($colors as $color) {
        //             foreach ($color->getPhotos()->getValues() as $photo) {
        //                 $associatedPhotos[] = $photo;
        //             }
        //         }
        //         $newPhotos = array_diff($associatedPhotos, $photos);
        //         for ($i = 0; $i < $nbImagesMax - count($photos) ; $i++) {
        //             if ($i < count($newPhotos)) {
        //                 array_push($photos, $newPhotos[$i]);
        //             }
        //         }

        //         $photos = array_unique($photos);
        //     }
        // }



        // if (count($photos) < $nbImagesMax) {
        //     $otherPhotos = array_unique($otherPhotos);
        //     $newPhotos = array_diff($otherPhotos, $photos);
        //     shuffle($newPhotos);
        //     for ($i = count($photos); $i < $nbImagesMax; $i++) {
        //         if ($i < count($newPhotos)) {
        //             array_push($photos, $newPhotos[$i]);
        //         }
        //     }
        //     if (count($photos) < $nbImagesMax) {
        //         $otherPhotos = $photoRepository->findAll();
        //         $otherPhotos = array_unique($otherPhotos);
        //         $newPhotos = array_diff($otherPhotos, $photos);
        //         shuffle($newPhotos);
        //         for ($i = count($photos); $i < $nbImagesMax; $i++) {
        //             if ($i < count($newPhotos)) {
        //                 array_push($photos, $newPhotos[$i]);
        //             }
        //         }
        //     }
        // }

        //New block maconerie
        if(count($photos) == 0){
            $otherPhotos = array_unique($otherPhotos);
            shuffle($otherPhotos);
            for($i = 0; $i < $nbImagesMax; $i++){
                if(isset($otherPhotos[$i])){
                    array_push($photos, $otherPhotos[$i]);
                }
            }
        }else{
            $diff = (count($photos) - $nbImagesMax);
            if (count($photos) > $nbImagesMax) {
                for ($i = 0; $i < $diff; $i++) {
                    shuffle($photos);
                    unset($photos[0]);
                }
            }
        }


        return $photos;
    }

    /**
     * @Route("/{slugCategory}/{slugSubCategory}", name="pages", priority=-10)
     */
    public function pages($slugCategory, $slugSubCategory, SlugRepository $slugRepository, ColorRepository $colorRepository): Response
    {
        $slugCategoryObject = $slugRepository->findOneByText($slugCategory);
        $slugSubCategoryObject = $slugRepository->findOneByText($slugSubCategory);
        $category = $slugCategoryObject->getCategoryTranslation()->getCategory();
        $subCategory = $slugSubCategoryObject->getSubCategoryTranslation()->getSubCategory();
        $colors = $colorRepository->getColorsByCategory($category->getId());
        $image = $subCategory->getImageName();

        return $this->render('pages/sub.html.twig', [
            'category' => $category,
            'subCategory' => $subCategory,
            'colors' => $colors,
            'image' => $image,
            // 'sub_trans' => $sub_trans,
            // 'slugCategory' => $slugCategory,
            // 'slugSubCategory' => $slugSubCategory,
            // 'category_title' => $category_title,
            // 'category_desc' => $category_desc,
            // 'category_img' => $category_img,
            // 'sub_title' => $sub_title,
            // 'colorsFamily' => $colorsFamily,
            // 'all_sub_trans' => $all_sub_trans,
        ]);
    }

}

