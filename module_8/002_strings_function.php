<?php
// Функции по работе со строками

// 1. Уберите слеши "/" в начале и в конце строки, если они есть
$url = '/some/path/to/page/';
var_dump(trim($url, "/"));


// 2. Уберите из строки все запятые и точки, а пробелы замените на тире
$line = 'Good news, everyone.';
$withoutDots = str_replace(',', '', $line);
$withoutCommas = str_replace('.', '', $withoutDots);
$withoutSpaces = str_replace(' ', '-', $withoutCommas);
var_dump($withoutSpaces);


// 3. Посчитайте и выведите длину строки переменной $line
$length = strlen($line);
var_dump($length);


// 4. Найдите на какой позиции находится запятая в строке $line и выведите это значение
$position = strpos($line, ',');
var_dump($position);


// 5. Вырежьте из строки $line подстроку после запятой до предпоследнего символа с конца
var_dump(substr(substr($line, strpos($line, ',')), 0, 2));


