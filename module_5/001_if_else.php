<?php

// 1. Создайте переменную с названием $value содержащую целое случайное число от 1 до 10.
// Выведите сообщение: "Полученное число {} больше 5", если это число действительно больше 5
// Вместо {} - выведите значения переменной $value
$value = rand(1, 10);
if($value > 5){
    var_dump("Полученное число $value больше 5");
}


// 2. Создайте переменную $timeToLearn - поместите в нее случайное boolean значение, используя такую конструкцию (bool) rand(0, 1)
// Если в переменной будет значение true, то выведите сообщение: "Я как раз сейчас и учусь"
// Если в переменной будет значение false - то выведите сообщение: "Что значит еще не время? Нет, для учебы всегда есть время"
$timeToLearn = (bool) rand(0, 1);
if($timeToLearn == true){
    var_dump("Я как раз сейчас и учусь");
}
else{
    var_dump("Что значит еще не время? Нет, для учебы всегда есть время");
}


// 3. Создайте переменную $hour, содержащую текущее время в часах, поместите в нее случайное значение от 0 до 23
// Если текущее время находится в диапазоне от 0 до 8 - выведите сообщения: "В это время нужно спать"
// Если время находится в диапазоне от 8 до 21 - выведите сообщения: "В это время занимайтесь полезными делами, или поспите после обеда"
// Если время находится в диапазоне от 21 до 23 - выведите сообщения: "Самое время готовиться ко сну"
$hour = rand(0, 23);
if($hour < 8 and $hour > 0){
    var_dump("В это время нужно спать");
}
elseif($hour < 21 and $hour > 8){
    var_dump("В это время занимайтесь полезными делами, или поспите после обеда");
}
elseif($hour < 23 and $hour > 21){
    var_dump("Самое время готовиться ко сну");
}




// 4. Создайте константу HOURS_IN_DAY и укажите в нее продолжительность суток в часах
// добавьте условие, если значение константы не равно 24 - выведите сообщение: "Неужели я не знаю что в сутках 24 часа?"

define('HOURS_IN_DAY', 24);
if(HOURS_IN_DAY != 24){
    var_dump("Неужели я не знаю что в сутках 24 часа?");
}


// 5. Даны три длины сторон треугольника, нужно понять существует ли такой треугольник.
// Создайте три переменные $a, $b, $c - стороны треугольника, поместите в каждую из них случайное значение от 1 до 5
// Выведите одно из сообщений: "Треугольник со сторонами {} {} {} существует" или "Невозможно создать треугольник со сторонами {} {} {}",
// вместо {} - должны быть выведены реальные значения сторон треугольника
$a = rand(1, 5);
$b = rand(1, 5);
$c = rand(1, 5);
if($a < $b + $c and $b < $a + $c and $c < $a + $b){
    var_dump("Треугольник со сторонами $a $b $c существует");
}
else{
    var_dump("Невозможно создать треугольник со сторонами $a $b $c");
}


// 6. Создайте переменную $dayNumber, содержащую номер дня недели, поместите в нее случайное значение от 1 до 7
// Выведите это выходной или нет, если неделя начинается с воскресенья (1 день - это воскресенье)
$dayNumber = rand(1, 7);
if($dayNumber == 1 or $dayNumber == 7){
    var_dump("Этот день выходной $dayNumber");
}
else{
    var_dump("Это рабочий день $dayNumber");
}
