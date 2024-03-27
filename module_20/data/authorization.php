<?php

namespace Module\Twenty;

if (isset($_POST['login']) && isset($_POST['password'])) {
    $currentSession = new AuthorizationChecker(Db::getConnection());
    $currentUser = $currentSession->validateUser();
    if (!empty($currentSession->validateUser())) {
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $currentUser['id'];
    }
}
