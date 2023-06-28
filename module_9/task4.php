<?php

$city1 = rand(0, 1000);
$city1Radius = rand(0, 1000);
$city2 = rand(0, 1000);
$city2Radius = rand(0, 1000);

$countOfCars = 10;//Количество машин
$cars = [];
for ($i = 1; $i <= $countOfCars; $i++) {
    $cars[$i] = rand(0, 1000);
}

foreach ($cars as $numberOfCar => $distance) {
    if (($distance < $city1 - $city1Radius or $distance > $city1 + $city1Radius)
        and ($distance < $city2 - $city2Radius or $distance > $city2
            + $city2Radius)
    ) {
        echo "Машина {$numberOfCar} едет вне города на {$distance} со скоростью не более 90 \n";
    } else {
        echo "Машина {$numberOfCar} едет по городу на {$distance} со скоростью не более 70 \n";
    }
}
