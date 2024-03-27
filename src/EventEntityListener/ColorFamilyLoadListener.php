<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\Category;
use App\Entity\ColorFamily;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;

class ColorFamilyLoadListener{
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
    public function postLoad(ColorFamily $colorFamily, LifecycleEventArgs $event): void
    {
        foreach($colorFamily->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $colorFamily->setDisplayName($translation->getText());
                $colorFamily->setCurrentTranslation($translation);
            }
        }
    }


}