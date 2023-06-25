<?php

$numbers = [];

for ($i = 0; $i < rand(3, 20); $i++) {
    array_unshift($numbers, rand(0, 10));
}

$sumOfNumbers = 0;
foreach ($numbers as $key => $value) {
    if ($key % 2 != 0) {
        $sumOfNumbers += $value;
    }
}
var_dump($numbers);
echo "Сумма чисел: {$sumOfNumbers}";
