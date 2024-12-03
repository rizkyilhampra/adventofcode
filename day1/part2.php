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

$lists = array_combine($firstLists, $secondLists);

$similarity = 0;
foreach ($lists as $first => $second) {
    $count = 0;

    foreach($secondLists as $secondList) {
        if ($first === $secondList) {
            $count++;
        }
    }

    $similarity += ($first * $count);
}

echo $similarity;

