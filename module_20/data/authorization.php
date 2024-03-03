<?php

namespace Module\Twenty;

if (isset($_POST['login']) && isset($_POST['password'])) {
    $user = new UserRepository(Db::getConnection());
    $user->validateUser();
}
