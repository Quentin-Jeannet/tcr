<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\SubCategory;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;

class SubCategoryLoadListener{
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
        $this->locale = (is_null($request)) ? 'en' : $request->getLocale();
    }
    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    // the entity listener methods receive two arguments:
    // the entity instance and the lifecycle event
    public function postLoad(SubCategory $subCategory, LifecycleEventArgs $event): void
    {
        foreach($subCategory->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $subCategory->setDisplayName($translation->getText());
                $subCategory->setCurrentTranslation($translation);  
            }
        }
    }


}