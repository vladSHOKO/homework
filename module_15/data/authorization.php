<?php

include "passwords.php";
include "users.php";
global $users;
global $passwords;

$authorized = false;

if (isset($_POST['login']) && isset($_POST['password'])) {
    $preparedUsers = array_flip($users);
    $key = $preparedUsers[$_POST['login']] ?? null;
    if ($key !== null) {
        $authorized = $passwords[$key] === $_POST['password']; // Передаём в суперглобальный массив $_SESSION информацию об успешной авторизации
        if ($authorized){
            setcookie('login', $_POST['login'], time() + 60 * 60);// Создаём cookie с логином пользователя
            setcookie('password', $_POST['password'], time() + 60 * 60);// Создаём cookie с паролем пользователя
            session_start(); // Запускаем сессию
            $_SESSION['authorized'] = true;
        }
    }
}
