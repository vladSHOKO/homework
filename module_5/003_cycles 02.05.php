<?php

// 1. Выведите числа от 0 до 9
for($i = 0; $i < 10; $i++){
    var_dump($i);

}


// 2. Выведите 10 случайных чисел от 1 до 10
for($i = 0; $i < 10; $i++){
    $randomNumber = rand(1, 10);
    var_dump($randomNumber);

}


// 3. Создайте массив $items из 10 случайных целых значений от 0 до 9
$items = [];
for($i = 0; $i < 10; $i++){
    $randomNumber = rand(0, 9);
    $items[$i] = $randomNumber;
}



// 4. Добавляйте случайные целые числа от 1 до 9 в массив $numbers до тех пор, пока сумма всех элементов этого массива меньше 100
// А затем выведите сколько числе всего в массиве: "Длинна массива numbers = {}"

$lenghtOfArray = 0;
$numbers = [];
$sumOfElementsOfArray = 0;
while(true){
    $randomNumber = rand(1, 9);
    
    if($sumOfElementsOfArray + $randomNumber < 100){
        $sumOfElementsOfArray += $randomNumber;
        $numbers[$lenghtOfArray] = $randomNumber;
        $lenghtOfArray += 1;
    }
    if($sumOfElementsOfArray + $randomNumber >= 100){
        var_dump("Длина массива numbers = $lenghtOfArray");
        break;
    }

}


// 5. Переберите массив $numbers, созданный ранее, и посчитайте сумму всех четных чисел в нем
// Выведите следующие строки (как всегда вместо {} подставив нужные значения):
// Общая сумма массива numbers = {}
// Из нее часть, которая приходится на четные числа = {}
// И часть из нечетных чисел = {}
$sumOfElementsOfArray = 0;
$sumOfChet = 0;
$sumOfNeChet = 0;
foreach($numbers as $value) {
    $sumOfElementsOfArray += $value;
    if($value % 2) {
        $sumOfNeChet += $value;
    }
    else{
        $sumOfChet += $value;
    }
}
var_dump("Общая сумма массива numbers = $sumOfElementsOfArray");
var_dump("Из неё часть, которая приходится на чётные числа = $sumOfChet");
var_dump("И часть из нечетных чисел = $sumOfNeChet");
