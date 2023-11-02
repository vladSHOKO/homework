<?php

$authtirized = false;

include "passwords.php";
include "users.php";

if (!empty ($_POST)) {
    $key = $users[$_POST['login']] ?? '0';
    $authtirized = $passwords[$key] === $_POST['password'];
}
