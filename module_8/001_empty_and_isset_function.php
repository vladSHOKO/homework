<?php
// Функции empty и isset
// Результат каждой проверки выведите с помощью функции var_dump()

// 1. Проверьте существует ли переменная $a и не пустая ли она $a
$a = 0;
var_dump(isset($a));

// 2. Проверьте существует ли переменная $b и не пустая ли она $b
$b = false;
var_dump(isset($b));

// 3. Проверьте существует ли переменная $c и не пустая ли она $c
$c = null;
var_dump(isset($c));

// 4. Проверьте существует ли переменная $d и не пустая ли она $d
$d = [];
var_dump(isset($d));

// 5. Проверьте каждый элемент массива $items существует ли он и не пустой ли он
$items = [
    [],
    1,
    null,
    'Привет',
    ''
];

foreach ($items as $item) {
    var_dump(isset($item));
}

