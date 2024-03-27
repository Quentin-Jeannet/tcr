<?php
// src/EventListener/UserChangedNotifier.php
namespace App\EventEntityListener;

use App\Entity\Category;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\RequestStack;

class CategoryLoadListener{
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
    public function postLoad(Category $category, LifecycleEventArgs $event): void
    {
        foreach($category->getTranslations() as $translation){
            if($translation->getLocale()==$this->locale){
                $category->setDisplayName($translation->getText());
                $category->setCurrentTranslation($translation);
            }
        }
    }


}