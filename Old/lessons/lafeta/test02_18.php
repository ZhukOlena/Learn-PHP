<?php

date_default_timezone_set('UTC');

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);


//$outputreport = [
//    '2022-12-01' => [
//        'cash' => 5654,
//        'transfer' => 950,
//        'returned' => 0,
//    ],
//    '2022-12-02' => [
//        'cash' => 9567,
//        'transfer' => 0,
//        'returned' => 150,
//    ],
//];


$inputFile = fopen(__DIR__ . '/test02_18.csv', 'r');
$outputFile = fopen(__DIR__ . '/New_Work_18.02.23.csv', 'w+');

$outputReports = [];

fgetcsv($inputFile);

while (!feof($inputFile)) {
    $row = fgetcsv($inputFile);

    $mode = $row[1];
    $date = date_create_from_format('Y-m-d H:i:s', $row [2]);
    $type = $row[4];
    $amount = $row[5];

    $datekey = date_format($date, 'Y-m-d');

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

ksort($outputReports);

fputcsv($outputFile, ['Date', 'Cash', 'Transfer', 'Returned']);

foreach ($outputReports as $date => $info) {
    fputcsv ($outputFile, [
        $date,
        $info['cash'],
        $info['transfer'],
        $info['returned'],
    ]);
}
print_r($outputReports);




