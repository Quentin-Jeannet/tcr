<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\ColorTranslation;
use App\Entity\ConfiguratorOption;
use App\Repository\SlugRepository;
use App\Repository\ColorRepository;
use App\Entity\ConfigurateurPngProcess;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ColorFamilyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ConfiguratorOptionRepository;
use App\Repository\CategoryTranslationRepository;
use App\Repository\ConfigurateurPngMaskRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Repository\SubCategoryTranslationRepository;
use App\Repository\ConfigurateurPngProcessRepository;
use App\Repository\ConfiguratorOrientationRepository;
use App\Repository\ConfigurateurPngOriginalRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Repository\ConfigurateurPngMaskFloorRepository;
use Doctrine\ORM\EntityManager;
use PhpOffice\PhpSpreadsheet\IOFactory as IOFactoryAlias;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
{
    /**
     * @Route("/change-locale/{locale}", name="change_locale")
     */
    public function index($locale, Request $request, RouterInterface $router, SlugRepository $slugRepository): Response
    {
        $request->getSession()->set('_locale', $locale);
        $referer =  $request->headers->get('referer');
        $refererPathInfo = Request::create($referer)->getPathInfo();
        $routeInfos = $router->match($refererPathInfo);
        $routeName = $routeInfos["_route"];
        switch($routeName){
            case "pages-category":
                $category = $slugRepository->findOneByText($routeInfos["slugCategory"])->getCategoryTranslation()->getCategory();
                $newSlug = $slugRepository->findByCategoryAndLocal($category, $locale)->getText();
                return $this->redirectToRoute("pages-category", ["slugCategory" => $newSlug]);
            case "pages":
                // dd($routeInfos);
                $category = $slugRepository->findOneByText($routeInfos["slugCategory"])->getCategoryTranslation()->getCategory();
                $subCategory = $slugRepository->findOneByText($routeInfos["slugSubCategory"])->getSubCategoryTranslation()->getSubCategory();
                $newSlugCategory = $slugRepository->findByCategoryAndLocal($category, $locale)->getText();
                $newSlugSubCategory = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();
                return $this->redirectToRoute("pages", ["slugCategory" => $newSlugCategory, "slugSubCategory" => $newSlugSubCategory]);
            case "app_detail":
                $category = $slugRepository->findOneByText($routeInfos["slugCategory"])->getCategoryTranslation()->getCategory();
                $newSlug = $slugRepository->findByCategoryAndLocal($category, $locale)->getText();
                return $this->redirectToRoute("color_detail", ["slugCategory" => $newSlug, "color" => $routeInfos["color"]]);
            case "app_footer_sub":
                $subCategory = $slugRepository->findOneByText($routeInfos["slugSubCategory"])->getSubCategoryTranslation()->getSubCategory();
                $newSlugSubCategory = $slugRepository->findBySubCategoryAndLocal($subCategory, $locale)->getText();
                return $this->redirectToRoute("app_footer_sub", ['slugSubCategory' => $newSlugSubCategory]);
            default:
                return $this->redirect($referer);
        }
    }

    /**
     * @Route("/getDB", name="getDB")
     */
    public function getDB(ColorRepository $colorRepository, ColorFamilyRepository $colorFamilyRepository, ConfigurateurPngMaskRepository $configurateurPngMaskRepository, ConfigurateurPngProcessRepository $configurateurPngProcessRepository, ConfigurateurPngOriginalRepository $configurateurPngOriginalRepository, ConfigurateurPngMaskFloorRepository $configurateurPngMaskFloorRepository, ConfiguratorOptionRepository $configuratorOptionRepository, ConfiguratorOrientationRepository $configuratorOrientationRepository)
    {
        // $json = file_get_contents('https://color-republic.graphikchannel.net/getDB');

        $colors = $colorRepository->findAll();
        $colorFamilies = $colorFamilyRepository->findAll();
        $configurateurPngMasks = $configurateurPngMaskRepository->findAll();
        $configurateurPngProcesses = $configurateurPngProcessRepository->findAll();
        $configurateurPngOriginals = $configurateurPngOriginalRepository->findAll();
        $configurateurPngMaskFloors = $configurateurPngMaskFloorRepository->findAll();
        $configuratorOptions = $configuratorOptionRepository->findAll();
        $configuratorOrientations = $configuratorOrientationRepository->findAll();



        $dataToSend = [
            'colors' => [],
            'colorsFamily' => [],
            'originalPNGDatas' => [],
            'processPNGDatas' => [],
            'maskPNGDatas' => [],
            'maskFloorPNGDatas' => [],
            'optionDatas' => [],
            'orientationDatas' => []
        ];

        foreach ($colors as $obj) {
            $families = [];
            foreach ($obj->getColorFamilies() as $colorFamily) {
                $families[] = $colorFamily->getText();
            }
            array_push($dataToSend['colors'], ['id' => $obj->getId(), 'name' => $obj->getName(), 'hexadecimal' => str_replace('#', '', $obj->getHexadecimal1()), 'familyName' => $families, 'rgba' => 'rgba(' . $obj->getRedFromRGBA() . ',' . $obj->getGreenFromRGBA() . ',' . $obj->getBlueFromRGBA() . ',255)']);
        }
        foreach ($colorFamilies as $obj) {
            array_push($dataToSend['colorsFamily'], ['id' => $obj->getId(), 'name' => $obj->getText(), 'route_id' => $obj->getCategory()->getImmutableSlug()]);
        }
        foreach ($configurateurPngOriginals as $obj) {
            array_push($dataToSend['originalPNGDatas'], ['id' => $obj->getId(), 'path' => $obj->getPath(), 'name' => $obj->getName(), 'position' => $obj->getPosition()]);
        }
        foreach ($configurateurPngProcesses as $obj) {
            array_push($dataToSend['processPNGDatas'], ['id' => $obj->getId(), 'path' => $obj->getPath(), 'type' => $obj->getType(), 'elementQuantity' => $obj->getElementQuantity(), 'roomName' => $obj->getRoom()->getName(), 'roomId' => $obj->getRoom()->getId()]);
        }
        foreach ($configurateurPngMasks as $obj) {
            array_push($dataToSend['maskPNGDatas'], ['id' => $obj->getId(), 'path' => $obj->getPath(), 'type' => $obj->getType(), 'position' => $obj->getPosition(), 'roomName' => $obj->getRoom()->getName(), 'roomId' => $obj->getRoom()->getId()]);
        }
        foreach ($configurateurPngMaskFloors as $obj) {
            array_push($dataToSend['maskFloorPNGDatas'], ['id' => $obj->getId(), 'path' => $obj->getPath(), 'type' => $obj->getType(), 'pattern' => $obj->getPattern(), 'roomName' => $obj->getRoom()->getName(), 'roomId' => $obj->getRoom()->getId()]);
        }
        foreach ($configuratorOptions as $obj) {
            // $arr = $obj->getFamilies()->map(function ($family) {
            //     return $family->getName();
            // })->toArray();
            array_push($dataToSend['optionDatas'], ['id' => $obj->getId(), 'name' => $obj->getTranslations()[0]->getText(), 'family_name' => []]);
        }
        foreach ($configuratorOrientations as $obj) {
            array_push($dataToSend['orientationDatas'], ['id' => $obj->getId(), 'name' => $obj->getTranslations()[0]->getText()]);
        }
        


        return new JsonResponse($dataToSend);
        // return new Response($json);
    }

    /**
     * @Route("/fillcolor", name="fillcolor")
     */
    public function fillcolor(ColorRepository $colorRepository, EntityManagerInterface $em)
    {
        $colors = $colorRepository->findAll();
        foreach ($colors as $color) {
            $color->getAssociatedColors()->clear();
            $color->getColors()->clear();
            $color->getTranslations()->clear();
        }
        $inputFileName = $this->getParameter('kernel.project_dir') . '/public/colors1.xlsx';
        $inputFileType = IOFactoryAlias::identify($inputFileName);
        /**  Create a new Reader of the type that has been identified  **/
        $reader = IOFactoryAlias::createReader($inputFileType);
        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($inputFileName);
        /** select sheet **/
        $spreadsheet->setActiveSheetIndexByName('Color');

        $rowIterator = $spreadsheet->getActiveSheet()->getRowIterator();

        foreach ($rowIterator as $row) {
            $rowIndex = $row->getRowIndex();
            $color = $colorRepository->findOneBy(['name' => $spreadsheet->getActiveSheet()->getCell('A' . $rowIndex)->getValue()]);
            $color->setSecondeName($spreadsheet->getActiveSheet()->getCell('B' . $rowIndex)->getValue());

            
            $assColor1 = $colorRepository->findOneBy(['name' => $spreadsheet->getActiveSheet()->getCell('C' . $rowIndex)->getValue()]);
            $assColor2 = $colorRepository->findOneBy(['name' => $spreadsheet->getActiveSheet()->getCell('D' . $rowIndex)->getValue()]);
            $assColor3 = $colorRepository->findOneBy(['name' => $spreadsheet->getActiveSheet()->getCell('E' . $rowIndex)->getValue()]);
            $assColor4 = $colorRepository->findOneBy(['name' => $spreadsheet->getActiveSheet()->getCell('F' . $rowIndex)->getValue()]);
            if ($assColor1) {
                $color->addColor($assColor1);
            }
            if ($assColor2) {
                $color->addColor($assColor2);
            }
            if ($assColor3) {
                $color->addColor($assColor3);
            }
            if ($assColor4) {
                $color->addColor($assColor4);
            }

            $translationEn = new ColorTranslation();
            $translationEn->setLocale('en');
            $translationEn->setDescription($spreadsheet->getActiveSheet()->getCell('G' . $rowIndex)->getValue());
            $em->persist($translationEn);

            $translationFr = new ColorTranslation();
            $translationFr->setLocale('fr');
            $translationFr->setDescription($spreadsheet->getActiveSheet()->getCell('H' . $rowIndex)->getValue());
            $em->persist($translationFr);

            $translationNl = new ColorTranslation();
            $translationNl->setLocale('nl');
            $translationNl->setDescription($spreadsheet->getActiveSheet()->getCell('I' . $rowIndex)->getValue());
            $em->persist($translationNl);

            $color->addTranslation($translationEn);
            $color->addTranslation($translationFr);
            $color->addTranslation($translationNl);

            $em->persist($color);


            

        }
        $em->flush();
        return new Response('ok');
    }

    /**
     * @Route("/new-configurateur", name="configurateur")
     */
    public function configurateur()
    {
        return $this->render('configurateur/index.html.twig');
    }

}