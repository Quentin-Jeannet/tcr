<?php

namespace App\DataFixtures;

use App\Entity\ColorTranslation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ColorTranslationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $fixturesMethods = new FixturesMethods();
        list($spreadsheet, $rowIterator) = $fixturesMethods->getSpreadsheetAndRowIterator(__DIR__ . '/resources/colors.xlsx', 'color_translation');

        foreach ($rowIterator as $row) {
            $rowIndex = $row->getRowIndex();
            if ($rowIndex > 1) {

                $colorTranslation = new ColorTranslation();
                $colorTranslation->setColor($this->getReference('color_' . $spreadsheet->getActiveSheet()->getCell("B" . $rowIndex)->getValue()));
                $colorTranslation->setDescription($spreadsheet->getActiveSheet()->getCell("C" . $rowIndex)->getValue());
                $colorTranslation->setLocale($spreadsheet->getActiveSheet()->getCell("D" . $rowIndex)->getValue());
            
                $manager->persist($colorTranslation);
            }
        }
        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            ColorFixtures::class,
        ];
    }
}
