<?php

require __DIR__ . '/cut_string.php';

$data = [
    'short line',
    'what the fox say?',
    'very very very long line',
    'i dont know what to write here)',
    'QSOFT is great',
    'teacher is crazy',
    'qwertyqwertyqwertyqwerty',
];

$result = [];

foreach ($data as $line) {
    array_push($result, cutString($line, 14, '...'));
}

var_dump($result);
