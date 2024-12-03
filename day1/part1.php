<?php

$lists = file(__DIR__.'/input.txt');

$firstLists = [];
$secondLists = [];
foreach ($lists as $list) {
    $numbers = explode('   ', $list);

    $firstNumber = (int) $numbers[0];
    $secondNumber = (int) $numbers[1];

    $firstLists[] = $firstNumber;
    $secondLists[] = $secondNumber;
}

$ascendingFirstLists = sort($firstLists);
$ascendingSecondLists = sort($secondLists);

$lists = array_combine($firstLists, $secondLists);

$distance = 0;
foreach ($lists as $first => $second) {
    $distance += abs($first - $second);
}

echo $distance;

