<?php

date_default_timezone_set('UTC');

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

$inputFile = fopen(__DIR__.'/lesson-14-report.csv', 'rb');
$outputFile = fopen(__DIR__.'/testClass-14-output.csv', 'wb+');

//class ReportElement
//{
//    private $mode;
//    private $date;
//    private $type;
//    private $amount;
//
//    public function __construct($mode, $date, $type, $amount)
//    {
//        $this->mode = $mode;
//        $this->date = $date;
//        $this->type = $type;
//        $this->amount = $amount;
//    }
//
//    public function getMode()
//    {
//        return $this->mode;
//    }
//
//    public function getType()
//    {
//        return $this->type;
//    }
//
//    public function getDate()
//    {
//        return $this->date;
//    }
//
//    public function getAmount()
//    {
//        return $this->amount;
//    }
//}

class ReportGenerator
{
    private $inputPath;
    private $outputPath;

    public function __construct($inputPath, $outputPath)
    {
        if (!file_exists($inputPath)) {
            throw new Exception('The input file"'.$inputPath.'" does not exist.');
        }

        $this->inputPath = $inputPath;
        $this->outputPath = $outputPath;
    }

    public function generate()
    {
        $reportData = $this->readData();

        ksort($reportData);

        $this->writeData($reportData);
    }

    private function readData()
    {
        $fileInfo = new SplFileInfo($this->inputPath);
        $file = $fileInfo->openFile('r');

        $outputReports = [];

        $file->fgetcsv();

        while (!$file->eof()) {
            $row = $file->fgetcsv();

            $mode = $row[1];
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $row [2]);
            $type = $row[4];
            $amount = $row[5];

            $datekey = $date->format( 'Y-m-d');

            if (!array_key_exists($datekey, $outputReports)) {
                $outputReports[$datekey] = [
                    'cash' => 0,
                    'transfer' => 0,
                    'returned' => 0,
                ];
            }

            if ($type === 'Картка') {
                if ($mode === 'SELL') {
                    $outputReports[$datekey]['transfer'] += $amount;
                } else if ($mode === 'RETURN') {
                    $outputReports[$datekey]['transfer'] -= $amount;
                    $outputReports[$datekey]['returned'] += $amount;
                } else {
                    throw new \Exception('Unknown mode: "'.$mode.'".');
                }
            } else if ($type === 'Готівка'){
                if ($mode === 'SELL') {
                    $outputReports[$datekey]['cash'] += $amount;
                } else if ($mode === 'RETURN') {
                    $outputReports[$datekey]['cash'] -=$amount;
                    $outputReports[$datekey]['returned'] += $amount;
                } else {
                    throw new \Exception('Unknown mode: "'.$mode.'".');
                }
            } else {
                throw new \Exception('Unknown type: "'.$type. '".');
            }
        }
        return $outputReports;
    }

    private function writeData($reportData)
    {
        $fileInfo = new \SplFileInfo($this->outputPath);
        $file = $fileInfo->openFile('wb+');

        $file->fputcsv(['Date', 'Cash', 'Transfer', 'Returned']);

        foreach ($reportData as $date => $info) {
            $file->fputcsv([
                $date,
                $info['cash'],
                $info['transfer'],
                $info['returned'],
            ]);
        }

    }
}

$generator = new ReportGenerator(__DIR__.'/lesson-14-report.csv', __DIR__.'/testClass-14-output.csv');
$generator->generate();
