<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\ConfiguratorOption;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;


class ConfiguratorOptionLoadListener{
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
    public function postLoad(ConfiguratorOption $configuratorOption, LifecycleEventArgs $event): void
    {
        foreach($configuratorOption->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $configuratorOption->setDisplayName($translation->getText());
                $configuratorOption->setCurrentTranslation($translation);
            }
        }
    }


}