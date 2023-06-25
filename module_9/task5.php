<?php

$studentsCount = rand(1, 1000000);

if ($studentsCount % 10 == 1) {
    echo "На занятии {$studentsCount} студент";
} elseif ($studentsCount % 10 >= 2 and $studentsCount % 10 <= 4) {
    echo "На занятии {$studentsCount} студента";
} elseif (($studentsCount % 10 >= 5 and $studentsCount % 10 <= 10)
    or $studentsCount % 100 >= 11 and $studentsCount % 10 <= 20
) {
    echo "На занятии {$studentsCount} студентов";
}
