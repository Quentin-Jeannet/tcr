<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use PhpOffice\PhpSpreadsheet\IOFactory as IOFactoryAlias;

class ColorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fixturesMethods = new FixturesMethods();
        list($spreadsheet, $rowIterator) = $fixturesMethods->getSpreadsheetAndRowIterator(__DIR__ . '/resources/colors.xlsx', 'color');
        

        foreach ($rowIterator as $row) {
            $rowIndex = $row->getRowIndex();
            if ($rowIndex > 1) {

                $color = new Color();
                $color->setName($spreadsheet->getActiveSheet()->getCell("B" . $rowIndex)->getValue());
                $color->setHexadecimal1($spreadsheet->getActiveSheet()->getCell("C" . $rowIndex)->getValue());
                $color->setRedFromRGBA($spreadsheet->getActiveSheet()->getCell("E" . $rowIndex)->getValue());
                $color->setGreenFromRGBA($spreadsheet->getActiveSheet()->getCell("F" . $rowIndex)->getValue());
                $color->setBlueFromRGBA($spreadsheet->getActiveSheet()->getCell("G" . $rowIndex)->getValue());
                $color->setCreatedAt(new \DateTimeImmutable('now'));
                $color->setUpdatedAt(new \DateTimeImmutable('now'));
                $color->setActive(true);           
                $manager->persist($color);
                $this->addReference('color_' . $spreadsheet->getActiveSheet()->getCell("A" . $rowIndex)->getValue(), $color);
            }

        }

        $color = new Color();
        $color->setName('B1');
        $color->setHexadecimal1('#AD9B76');
        $color->setRedFromRGBA(173);
        $color->setGreenFromRGBA(155);
        $color->setBlueFromRGBA(118);
        $color->setCreatedAt(new \DateTimeImmutable('now'));
        $color->setUpdatedAt(new \DateTimeImmutable('now'));
        $color->setActive(true);
        $manager->persist($color);
        $this->addReference('color_B1', $color);


        $manager->flush();
    }

}
