<?php
// Исправьте стили оформления приложенного кода

// 1. Операторы
$x = rand(0, 9);
$a = $c = 1;
$b = -2;
$d = $a * $x * $x + $b * $x + $c;

// 2. Управляющие конструкции
while ($x < 10) {
    $x++;
}

// 3. Еще Управляющие конструкции
if ($x - 3 == 7) {
    echo 'done';
}

// 4. Отступы
if ($x > 1) {
    if ($x < 4) {
        echo 'done';
    } else {
        echo 'done';
    }
}

// 4. Фигурные скобки
if ($x > 0) {
    echo '> 0';
} elseif ($x === 0) {
    echo '== 0';
} else {
    echo '= 0';
}

// 5. Параметры функции
$x = rand(0, 1);

// 6. Просто катастрофа
$x = rand(0, 9);
if ($x > 3) {
    echo $x;
} else {
    $x++;
    echo 'done';
}

// 7. Массив
$data = [
    'first' => 2,
    'second' => 4,
    [
        3,
        4,
        5,
        6
    ],
];
