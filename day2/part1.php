<?php

$reports = file(__DIR__.'/input.txt');
$results = [];

$line = 1;
foreach ($reports as $report) {
    $numbers = explode(' ', $report);

    if (isSafe($numbers, $line)) {
        $results[] = $line;
    }

    $line++;
}

function isSafe($numbers, $line)
{
    $increase = false;
    $decrease = false;

    for ($i = 0; $i < count($numbers); $i++) {
        if ($increase && $decrease) {
            return false;
        }

        if ($i + 1 === count($numbers)) {
            break;
        }

        $firstNumber = (int) $numbers[$i];
        $secondNumber = (int) $numbers[$i + 1];
        $deviation = abs($firstNumber - $secondNumber);

        if ($firstNumber === $secondNumber) {
            return false;
        } elseif ($firstNumber < $secondNumber) {
            $increase = true;
        } elseif ($firstNumber > $secondNumber) {
            $decrease = true;
        }

        if (
            $decrease || $increase
        ) {
            if(
                $deviation == 0 ||
                    $deviation > 3
            ) {
                return false;
            }

            continue;
        } else {
            return false;
        }
    }

    return true;
}

echo count($results);
