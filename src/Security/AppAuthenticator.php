<?php

namespace App\Security;

use App\Entity\Color;
use App\Entity\Price;
use App\Entity\Finish;
use App\Entity\Panier;
use App\Entity\Article;
use App\Entity\Goodies;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;

class AppAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private UrlGeneratorInterface $urlGenerator;
    private EntityManagerInterface $em;

    public function __construct(UrlGeneratorInterface $urlGenerator, EntityManagerInterface $em)
    {
        $this->urlGenerator = $urlGenerator;
        $this->em = $em;
    }


    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');

        $request->getSession()->set(Security::LAST_USERNAME, $email);


        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }
        
        // On vérifie si on a à faire un compte vérifié (suite à clic dans le mail reçu)
        if(!$token->getUser()->IsVerified()){
            return new RedirectResponse($this->urlGenerator->generate('app_logout'));
        }

        if (!$token->getUser()->getPanier()) {
            $panier = new Panier();
            $token->getUser()->setPanier($panier);
            $this->em->persist($panier);

        }
        if($request->getSession()->get('articles') != null){
            foreach($request->getSession()->get('articles') as $article){

                
                $articleType = $article->getType();
                
                switch($articleType){
                    case 'color':
                        $articlePrice = $article->getActualPrice()->getId();
                        $articleColor = $article->getColor()->getId();
                        $articleFinish = $article->getFinish()->getId();
                        $existingArticle = $this->em->getRepository(Article::class)->findOneBy(['panier' => $token->getUser()->getPanier(), 'actualPrice' => $articlePrice, 'color' => $articleColor, 'finish' => $articleFinish]);
                        if ($existingArticle != null) {
                            $existingArticle->setQuantity($existingArticle->getQuantity() + $article->getQuantity());
                            $this->em->persist($existingArticle);
                        } else {
                            $price = $this->em->getRepository(Price::class)->find($articlePrice);
                            $color = $this->em->getRepository(Color::class)->find($articleColor);
                            $finish = $this->em->getRepository(Finish::class)->find($articleFinish);
                            $article->setActualPrice($price);
                            $article->setColor($color);
                            $article->setFinish($finish);
                            $panier = $token->getUser()->getPanier();
                            $this->em->persist($article);
                            $panier->addArticle($article);
                            $this->em->persist($panier);
                        }
                        break;
                    case 'goodies':
                        $articleGoodies = $article->getGoodie()->getId();
                        $goodies = $this->em->getRepository(Goodies::class)->find($articleGoodies);
                        $article->setGoodie($goodies);
                        $panier = $token->getUser()->getPanier();
                        $this->em->persist($article);
                        $panier->addArticle($article);
                        $this->em->persist($panier);
                        break;
                }


            }
        }

        
        $this->em->flush();
        
        // On vérifie si on a à faire à un ADMIN ou un USER
        if(in_array("ROLE_ADMIN", $token->getUser()->getRoles())){
            return new RedirectResponse($this->urlGenerator->generate('admin'));
        }else{
            $referer = $request->headers->get('referer');
            return new RedirectResponse($referer);
        }

        



        // For example:
        // return new RedirectResponse($this->urlGenerator->generate('some_route'));
        throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
