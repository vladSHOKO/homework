<pre>
<?php

$city1 = 250;
$city1Radius = 300;
$city2 = 750;
$city2Radius = 300;

$countOfCars = 10;//Количество машин

for ($i = 0; $i < $countOfCars; $i++) {
    $positionOfCar = rand(1, 1000);
    $numberOfCar = $i + 1;
    if (($positionOfCar < 250 or $positionOfCar > 400) and ($positionOfCar < 600
            or $positionOfCar > 900)
    ) {
        echo "Машина {$numberOfCar} едет вне города на {$positionOfCar} со скоростью не более 70 километров ";
    } else {
        echo "Машина {$numberOfCar} едет по городу на {$positionOfCar} со скоростью не более 70 километров ";
    }
}
?>
</pre>
