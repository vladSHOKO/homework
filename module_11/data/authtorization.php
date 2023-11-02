<?php

$authtirized = false;

include "passwords.php";
include "users.php";

if (!empty ($_POST)) {
    $key = $users[$_POST['login']] ?? '0';
    $authtirized = $passwords[$key] === $_POST['password'];


    if ($authtirized) {
        include "include/success_message.php";
    } else {
        include "include/error_message.php";
    }
}




//if (array_key_exists($_POST['login'], $_POST)) {
//    if ($_POST['login'] === $users[$_POST['login']]
//        && $_POST['password']
//        === $passwords[$_POST['password']]
//    ) {
//        include "include/success_message.php";
//        $authtirized = true;
//    } else {
//        include "include/error_message.php";
//    }
//}
