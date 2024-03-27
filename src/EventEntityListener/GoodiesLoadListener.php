<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\Goodies;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;

class GoodiesLoadListener{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    private $locale;
    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct(RequestStack $requestStack)
    {
        $request = $requestStack->getCurrentRequest();
        $this->locale = $request->getLocale();
    }
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    // the entity listener methods receive two arguments:
    // the entity instance and the lifecycle event
    public function postLoad(Goodies $goodie, LifecycleEventArgs $event): void
    {
        foreach($goodie->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $goodie->setDisplayName($translation->getText());
                $goodie->setCurrentTranslation($translation);
            }
        }
    }


}