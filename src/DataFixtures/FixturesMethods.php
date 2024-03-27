<?php

namespace App\DataFixtures;

use PhpOffice\PhpSpreadsheet\IOFactory as IOFactoryAlias;

class FixturesMethods
{
    public static function getSpreadsheetAndRowIterator(string $inputFileName, string $activeSheetName): array
    {
        /**  Identify the type of $inputFileName  **/
        $inputFileType = IOFactoryAlias::identify($inputFileName);
        /**  Create a new Reader of the type that has been identified  **/
        $reader = IOFactoryAlias::createReader($inputFileType);
        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($inputFileName);
        /** select sheet **/
        $spreadsheet->setActiveSheetIndexByName($activeSheetName);

        $rowIterator = $spreadsheet->getActiveSheet()->getRowIterator();

        return array($spreadsheet, $rowIterator);
    }
}

