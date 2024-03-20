<?php

namespace Module\Twenty;

if (isset($_POST['login']) && isset($_POST['password'])) {
    $user = new AuthorizationChecker(Db::getConnection());
    $user->validateUser();
}
