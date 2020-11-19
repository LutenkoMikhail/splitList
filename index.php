<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


echo "<h3>Test task. </h3>";
echo "<h3> splitList </h3>";

$valuesArray = ['Banh khot', 'Banh xeo', 'Bun bo Hue', 'Cao lau',
    'Cha ca', 'Ga tan', 'Goi cuon', 'Nem ran', 'Pho','777777','88888888888'];


/**
 * Splits the list into a specified number of even columns.
 * @param array $list
 * @param int $n
 * @return array
 */
function splitList($list, $n): array
{
    $resultArray = [];

    if (count($list) !== 0) {
        $resultArray = array_chunk($list, ceil(count($list) / $n));

        $countArray = count($resultArray);
        if (count($resultArray[$countArray - 1]) <> count($resultArray[$countArray - 2])
            && count($list) % 2 === 0 && $n % 2 === 0) {
            array_unshift($resultArray[$countArray - 1], end($resultArray[$countArray - 2]));
            array_splice($resultArray[$countArray - 2], -1);
        }
    }
    return $resultArray;
}

echo 'Source array : ' . PHP_EOL;
var_dump($valuesArray);
echo PHP_EOL;
echo 'Result array : ' . PHP_EOL;
var_dump(splitList($valuesArray, 7));
echo PHP_EOL;



