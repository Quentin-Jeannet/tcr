<?php

namespace App\Controller;


use App\Classe\Panier;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\ColorRepository;
use App\Repository\FinishRepository;
use App\Repository\GoodiesRepository;
use App\Repository\PanierRepository;
use App\Repository\PriceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class PanierController extends AbstractController
{
    private $locale;


    public function __construct(RequestStack $requestStack)
    {
        $this->locale = $requestStack->getCurrentRequest()->getLocale();
    }


    /**
     * @Route("/panier", priority=10, name="panier_index")
     */
    public function index(Request $request): Response
    {
        if($this->getUser()){
            $articles = $this->getUser()->getPanier()->getArticles();
        }
        else{
            $articles = $request->getSession()->get('articles');
        }
        return $this->render('panier/index.html.twig', [
            'articles' => $articles,
        ]);
    }


    
    /**
     * @Route("/panier/ajouter/color", name="panier_add_color")
     */
    public function addColor(Request $request, ColorRepository $colorRepository, PriceRepository $priceRepository, ArticleRepository $articleRepository,FinishRepository $finishRepository, EntityManagerInterface $em): Response
    {
        
        $color = $colorRepository->find($request->request->get('color'));
        $finish = $finishRepository->find($request->request->get('finish'));
        if ($this->getUser()){
            $panier = $this->getUser()->getPanier();
        }else{
            if ($request->getSession()->get('articles') != null){
                $articles= $request->getSession()->get('articles');
            }else{
                $articles = [];
            }
        }

        foreach (json_decode($request->request->get('articles')) as $article) {
            $price = $priceRepository->find($article->priceId);
            $num = $article->num;


            if ($this->getUser()) {
                    $existentArticle = $articleRepository->findOneBy(['panier' => $panier, 'color' => $color, 'actualPrice' => $price, 'finish' => $finish]);
                    if ($existentArticle != null) {
                        $existentArticle->setQuantity($existentArticle->getQuantity() + $num);
                        $em->persist($existentArticle);
                    } else {
                        $articlePanier = new Article();
                        $articlePanier->setColor($color);
                        $articlePanier->setActualPrice($price);
                        $articlePanier->setType($request->request->get('type'));
                        $articlePanier->setQuantity($num);
                        $articlePanier->setFinish($finish);
                        $em->persist($articlePanier);
                        $panier->addArticle($articlePanier);
                    }
                    
            }else{
                    if(array_key_exists($request->request->get('type') . '_' . $color->getId() . '_' . $price->getId() . '_' . $finish->getId(), $articles)){
                        $articles[$request->request->get('type') . '_' . $color->getId() . '_' . $price->getId() . '_' . $finish->getId()]->setQuantity($articles[$request->request->get('type') . '_' . $color->getId() . '_' . $price->getId() . '_' . $finish->getId()]->getQuantity() + $num);
                    }else{
                        $articlePanier = new Article();
                        $articlePanier->setColor($color);
                        $articlePanier->setActualPrice($price);
                        $articlePanier->setType($request->request->get('type'));
                        $articlePanier->setQuantity($num);
                        $articlePanier->setFinish($finish);
                        $articles[$request->request->get('type'). '_' .$color->getId() . '_' . $price->getId() .'_'. $finish->getId()] = $articlePanier;
                    }
            }
        }
        if ($this->getUser()) {
            $em->persist($panier);
            $em->flush();
        }else{
            $session = $request->getSession();
            $session->set('articles', $articles);
        }

        $colors = $color->getColors()->getValues();

        if (count($colors) < 6) {
            $count = 6 - count($colors) ;
            $allColors = array_diff($colorRepository->findAll(), $colors);
            shuffle($allColors);
            for ($i=0; $i < $count; $i++) { 
                $colors[] = $allColors[$i];
            }
        }


        return $this->render('pages/_recommandedColors.html.twig', [
                'colors' => $colors,
            ]);
    }
    /**
     * @Route("/panier/ajouter/goodies", name="panier_add_goodies")
     */
    public function addGoodies(Request $request, GoodiesRepository $goodiesRepository, ArticleRepository $articleRepository ,EntityManagerInterface $em): Response
    {
        $goodies = $goodiesRepository->find($request->request->get('goodies'));

        $article = New Article();
        $article->setQuantity(1);
        $article->setType($request->request->get('type'));
        $article->setGoodie($goodies);

        if ($this->getUser()) {
            $panier = $this->getUser()->getPanier();
            $em->persist($article);
            $panier->addArticle($article);
            $em->persist($panier);
            $em->flush();
        } else {
            if ($request->getSession()->get('articles') != null) {
                $articles = $request->getSession()->get('articles');
            } else {
                $articles = [];
            }
            $articles[] = $article;
            $request->getSession()->set('articles', $articles);
        }

        $recommandedGoodies = array_diff($goodiesRepository->findAll(), [$goodies]);
        shuffle($recommandedGoodies);
        $recommandedGoodies = array_slice($recommandedGoodies, 0, 6);

        return $this->render('pages/_recommandedGoodies.html.twig', [
            'goodies' => $recommandedGoodies,
        ]);
    }
    /**
     * @Route("/panier/remove-one", name="panier_remove_one")
     */
    public function removeOne(Request $request,ArticleRepository $articleRepository,  EntityManagerInterface $em)
    {
        $id = $request->request->get('id');
        if ($this->getUser()) {
            $article = $articleRepository->find($id);
            $newQuantity = $article->getQuantity() - 1;
            if ($newQuantity > 0) {
                $article->setQuantity($newQuantity);
                $em->persist($article);
            } else {
                $this->getUser()->getPanier()->removeArticle($article);
                $em->remove($article);
            }
            $em->flush();
        } else {
            $articles = $request->getSession()->get('articles');
            $newQuantity = $articles[$id]->getQuantity() - 1;
            if ($newQuantity > 0) {
                $articles[$id]->setQuantity($newQuantity);
            } else {
                unset($articles[$id]);
            }
            $request->getSession()->set('articles', $articles);
        }

        if ($this->getUser()) {
            $articles = $this->getUser()->getPanier()->getArticles();
        } else {
            $articles = $request->getSession()->get('articles');
        }

        return $this->render('panier/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/panier/add-one", name="panier_add_one")
     */
    public function addOne(Request $request,ArticleRepository $articleRepository, EntityManagerInterface $em)
    {
        $id = trim($request->request->get('id'));
        if ($this->getUser()) {
            $article = $articleRepository->find($id);
            $article->setQuantity($article->getQuantity() + 1);
            $em->persist($article);
            $em->flush();
        } else {
            $articles = $request->getSession()->get('articles');
            $articles[$id]->setQuantity($articles[$id]->getQuantity() + 1);
            $request->getSession()->set('articles', $articles);
        }
        if ($this->getUser()) {
            $articles = $this->getUser()->getPanier()->getArticles();
        } else {
            $articles = $request->getSession()->get('articles');
        }
        return $this->render('panier/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/panier/remove-article", name="panier_remove_article")
     */
    public function removeArticle(Request $request, ArticleRepository $articleRepository, EntityManagerInterface $em)
    {
        $id = $request->request->get('id');
        if ($this->getUser()) {
            $article = $articleRepository->find($id);
            $this->getUser()->getPanier()->removeArticle($article);
            $em->remove($article);
            $em->flush();
        } else {
            $articles = $request->getSession()->get('articles');
            unset($articles[$id]);
            $request->getSession()->set('articles', $articles);
        }
        if ($this->getUser()) {
            $articles = $this->getUser()->getPanier()->getArticles();
        } else {
            $articles = $request->getSession()->get('articles');
        }
        return $this->render('panier/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/panier/remove-all", name="panier_remove_all")
     */
    public function removeAll(Request $request, EntityManagerInterface $em)
    {

        if ($this->getUser()) {
            $panier = $this->getUser()->getPanier();
            foreach ($panier->getArticles() as $article) {
                $em->remove($article);
            }
            $em->flush();
        } else {
            $request->getSession()->remove('articles');
        }
        if ($this->getUser()) {
            $articles = $this->getUser()->getPanier()->getArticles();
        } else {
            $articles = $request->getSession()->get('articles');
        }
        return $this->render('panier/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
