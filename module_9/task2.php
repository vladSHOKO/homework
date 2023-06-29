<?php

$values = [];

for ($i = 0; $i < 10; $i++) {
    array_unshift($values, rand(0, 100));
}

$temporary = $values[0];
$temporaryKey = 0;
foreach ($values as $key => $value) {
    if ($temporary > $value) {
        $temporary = $value;
        $temporaryKey = $key;
    }
}
var_dump($values);
echo "Минимальное значение в массиве: {$temporary}. Ключ: {$temporaryKey}";
