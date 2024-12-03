<?php

$reports = file(__DIR__.'/input.txt');
$results = [];
$line = 0;

function isSafe($numbers)
{
    if (isSequenceSafe($numbers)) {
        return true;
    }

    for ($i = 0; $i < count($numbers); $i++) {
        $tempNumbers = $numbers;
        array_splice($tempNumbers, $i, 1);
        if (isSequenceSafe($tempNumbers)) {
            return true;
        }
    }

    return false;
}

function isSequenceSafe($numbers)
{
    $increase = false;
    $decrease = false;

    for ($i = 0; $i < count($numbers) - 1; $i++) {
        $firstNumber = (int) $numbers[$i];
        $secondNumber = (int) $numbers[$i + 1];
        $deviation = abs($firstNumber - $secondNumber);

        if ($firstNumber === $secondNumber) {
            return false;
        } elseif ($firstNumber < $secondNumber) {
            if ($decrease) {
                return false;
            }
            $increase = true;
        } elseif ($firstNumber > $secondNumber) {
            if ($increase) {
                return false;
            }
            $decrease = true;
        }

        if ($deviation > 3) {
            return false;
        }
    }

    return true;
}


foreach ($reports as $report) {
    $numbers = explode(' ', $report);

    if (isSafe($numbers, $line)) {
        $results[] = $line;
    } 
    
    $line++;
}


print_r(count($results));
