<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\Color;
use App\Entity\Floor;
use App\Entity\Goodies;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;

class FloorLoadListener{
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
        $this->locale = (is_null($request)) ? "en"  : $request->getLocale();
    }
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    // the entity listener methods receive two arguments:
    // the entity instance and the lifecycle event
    public function postLoad(Floor $floor, LifecycleEventArgs $event): void
    {
        foreach($floor->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $floor->setDisplayName($floor->getText());
                $floor->setCurrentTranslation($translation);
            }
        }
    }


}