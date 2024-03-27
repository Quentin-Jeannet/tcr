<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\Color;
use App\Entity\FloorFamily;
use App\Entity\Goodies;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;

class FloorFamilyLoadListener{
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
    public function postLoad(FloorFamily $floorFamily, LifecycleEventArgs $event): void
    {
        foreach($floorFamily->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $floorFamily->setDisplayName($floorFamily->getText());
                $floorFamily->setCurrentTranslation($translation);
            }
        }
    }


}