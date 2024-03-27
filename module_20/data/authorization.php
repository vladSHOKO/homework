<?php

namespace Module\Twenty;

if (isset($_POST['login']) && isset($_POST['password'])) {
    $currentSession = new AuthorizationChecker(Db::getConnection());
    $currentUser = $currentSession->validateUser($_POST['login'], $_POST['password']);
    if (!empty($currentUser)) {
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $currentUser['id'];
    }
}
