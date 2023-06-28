<?php

$studentsCount = $controlStudentCount = rand(1, 1000000);

//if ($studentsCount % 10 == 1) {
//    echo "На занятии {$studentsCount} студент";
//} elseif ($studentsCount % 10 >= 2 and $studentsCount % 10 <= 4) {
//    echo "На занятии {$studentsCount} студента";
//} elseif (($studentsCount % 10 >= 5 and $studentsCount % 10 <= 10)
//    or $studentsCount % 100 >= 11 and $studentsCount % 10 <= 20
//) {
//    echo "На занятии {$studentsCount} студентов";
//}



$words = ["студент", "студента", "студентов"];

$studentsCount = $studentsCount % 100;
if ($studentsCount > 19){
    $studentsCount = $studentsCount % 10;
}

switch ($studentsCount){
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


