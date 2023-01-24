<?php

date_default_timezone_set('UTC');

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

$data = json_decode(file_get_contents(__DIR__.'/lesson-12_fop.json'), true);

function render_result(array $result)
{
    foreach ($result as $fopName => $fopData) {
        foreach ($fopData as $date => $amounts) {
            $date = date_create_from_format('Y-m', $date);

            print $fopName.' '.date_format($date, 'F Y').' -  '.number_format($amounts, 2, '.', '').' '.'UAH'.PHP_EOL;
        }
    }
}

//                                Варіант 1
//$result = [
//    "FOP 1" =>[
//        '2022-01' => 123456,
//        '2022-02' => 557221,
//        '2022-03' => 876222,
//    ],
//
//    "FOP 2" => [
//        '2022-01' => 987654,
//        '2022-02' => 666333,
//        '2022-03' => 555444,
//    ],
//];

$result = [];

foreach ($data as $item) {
    $date = date_create_from_format('Y-m-d', $item['date']);
//    $date = new DateTimeImmutable('W, Y-m-d', $item['date']);

    $fopName = $item['fop'];
    $amounts = $item['amount'];

    if (!array_key_exists($fopName, $result)) {
        $result[$fopName] = [];
    }

    $yearWithMonth = date_format($date, 'Y-m');

    if (!array_key_exists($yearWithMonth, $result[$fopName])) {
        $result[$fopName][$yearWithMonth] = 0;
    }

    $result[$fopName][$yearWithMonth] += $amounts;
}

render_result($result);

$sortedReport = [];

foreach ($result as $key => $reportItem) {
    uasort($reportItem, function ($a, $b) {
        if ($a === $b) {
            return 0;
        }
        return $a['date'] > $b ['date'] ? 1 : -1;
    });
    $sortedReport [$key] = $reportItem;
}

render_result($sortedReport);



//                                        Варіант 2
//$result = [
//    'FOP 1' => 1234,
//    'FOP 2' => 3333,
//    'FOP 3' => 4545,
//];

//$result = [];
//
//foreach ($data as $item) {
//    $fopName = $item['fop'];
//    $amounts = $item['amount'];
//
//    if (!array_key_exists($fopName, $result)) {
//        $result[$fopName] = 0;
//    }
//
//    $result[$fopName] += $amounts;
//}
//
//foreach ($result as $fopName => $amounts) {
//
//    print $fopName. ' - '.number_format($amounts,2, '.', ' '). ' UAH '.PHP_EOL;
//}