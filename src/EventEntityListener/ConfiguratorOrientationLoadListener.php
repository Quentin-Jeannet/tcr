<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\ConfiguratorOption;
use App\Entity\ConfiguratorOrientation;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;


class ConfiguratorOrientationLoadListener{
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
    public function postLoad(ConfiguratorOrientation $configuratorOrientation, LifecycleEventArgs $event): void
    {
        foreach($configuratorOrientation->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $configuratorOrientation->setDisplayName($translation->getText());
                $configuratorOrientation->setCurrentTranslation($translation);
            }
        }
    }


}