<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\Color;
use App\Entity\Goodies;
use App\Entity\FloorFamily;
use App\Entity\FloorPattern;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;

class FloorPatternLoadListener{
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
    public function postLoad(FloorPattern $floorPattern, LifecycleEventArgs $event): void
    {
        foreach($floorPattern->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $floorPattern->setDisplayName($translation->getName());
                $floorPattern->setCurrentTranslation($translation);
            }
        }
    }


}