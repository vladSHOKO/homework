<?php

$studentsCount = $controlStudentCount = rand(1, 1000000);
$words = ["студент", "студента", "студентов"];

$studentsCount = $studentsCount % 100;
if ($studentsCount > 19) {
    $studentsCount = $studentsCount % 10;
}

switch ($studentsCount) {
    case 1:
        echo "На занятии {$controlStudentCount} {$words[0]} ";
        break;
    case 2:
    case 3:
    case 4:
        echo "На занятии {$controlStudentCount} {$words[1]} ";
        break;
    default:
        echo "На занятии {$controlStudentCount} {$words[2]} ";
}


