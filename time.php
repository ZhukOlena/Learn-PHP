<?php

date_default_timezone_set('UTC');

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// Y-m-d H:i:s
//$date = date_create('1990-03-13');
//$now = date_create('+24 month');
//
//$yearsOld = date_format($now, 'Y') - date_format($date, 'Y');
//
//print $yearsOld.PHP_EOL;
//

//date_time_set($date, 0,0,);

$data = json_decode(file_get_contents(__DIR__.'/lesson-12_fop.json'),true);

$report =[];
$total = 0;
$fops = [];

foreach ($data as $element) {
    $date = $element ['date'];

    if (!in_array($element['fop'], $fops)) {
        $fops[] = $element['fop'];
    }

    if (!array_key_exists($date, $report)) {
        $report[$date] = 0;
    }

    $total += $element['amount'];

    $report[$date] += $total;

    print_r($total);
}

//print_r($fops);


//foreach ($total as $amount => $item) {
//    $date = date_create($date);

//    print date_format($date, 'F Y'). ' - '.$item. ' '. 'UAH'.PHP_EOL;
//}

//$sortedReport = [];
//
//foreach ($report as $key => $reportItem) {
//    uasort($reportItem, function ($a, $b){
//        if ($a === $b) {
//            return 0;
//        }
//        return $a < $b ? 1 : -1;
//    });
//
//    $sortedReport [ $key] = $reportItem;
//}
//
//print_r($sortedReport);

