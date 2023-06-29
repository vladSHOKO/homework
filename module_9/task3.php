<?php

$numbers = [];

$randomLength = rand(3, 20);
for ($i = 0; $i < $randomLength; $i++) {
    array_unshift($numbers, rand(0, 10));
}

$sumOfNumbers = 0;
foreach ($numbers as $key => $value) {
    if ($key % 2) {
        $sumOfNumbers += $value;
    }
}
var_dump($numbers);
echo "Сумма чисел: {$sumOfNumbers}";
