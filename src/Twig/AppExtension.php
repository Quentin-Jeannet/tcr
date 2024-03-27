<?php

declare(strict_types=1);

namespace App\Twig;

use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('floorFilter', [$this, 'floorFilter']),
            new TwigFilter('colorFilter', [$this, 'colorFilter']),
        ];
    }

    public function floorFilter($items)
    {
        usort($items, function($a, $b) {
            return $a->getFloorFamily() <=> $b->getFloorFamily();
        });
        foreach($items as $item){
            $letters = str_split($item->getText());
            $numberPosition = 0;
            foreach($letters as $key => $letter){
                if(is_numeric($letter) && $numberPosition == 0){
                    $numberPosition = $key;
                }
            }
            if($numberPosition > 0)
            {
                $item->setNumberFromString(intval(substr($item->getText(), $numberPosition)));
            }
        }
        usort($items, function($a, $b) {
            if($a->getFloorFamily() == $b->getFloorFamily()){
                if($a->getNumberFromString() == null || $b->getNumberFromString() == null){
                    return $a->getText() <=> $b->getText();
                }else{
                    return $a->getNumberFromString() <=> $b->getNumberFromString();

                }
            }
            return $a->getFloorFamily() <=> $b->getFloorFamily();
        });
        return $items;
    }

    public function colorFilter($items)
    {
        foreach($items as $item){

            $letters = str_split($item->getDisplayName());
            $numberPosition = 0;
            foreach($letters as $key => $letter){
                if(is_numeric($letter) && $numberPosition == 0){
                    $numberPosition = $key;
                }
            }
            if($numberPosition > 0)
            {
                $item->setNumberFromString(intval(substr($item->getDisplayName(), $numberPosition)));
            }
        }
        usort($items, function($a, $b) {
            return $a->getNumberFromString() <=> $b->getNumberFromString();
        });
        return $items;
    }
}
