<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\Finish;
use App\Entity\Goodies;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;

class FinishLoadListener{
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
    public function postLoad(Finish $finish, LifecycleEventArgs $event): void
    {
        foreach($finish->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $finish->setDisplayName($translation->getText());
                $finish->setCurrentTranslation($translation);
            }
        }
    }


}