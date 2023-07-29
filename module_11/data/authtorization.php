<?php

$authtirized = false;
$authorization = 'Авторизация';

if (array_key_exists('login', $_POST)) {
    for ($i = 0; $i < count($users); $i++) {
        if ($_POST['login'] === $users[$i]
            && $_POST['password']
            === $passwords[$i]
        ) {
            include "include/success_message.php";
            $authtirized = true;
            break;
        } else {
            include "include/error_message.php";
            $authtirized = false;
            break;
        }
    }
}

if ($authtirized) {
    $authorization = 'Выйти';
} else {
    $authorization = 'Авторизация';
}
