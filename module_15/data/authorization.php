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
        $authorized = $passwords[$key] === $_POST['password'];
        $_SESSION['auth'] = true;
    }
}
