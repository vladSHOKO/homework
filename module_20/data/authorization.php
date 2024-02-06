<?php

if (isset($_POST['login']) && isset($_POST['password'])) {
    $user = new Authorization(
        '127.0.0.1',
        'root',
        'Faraonkill1',
        'authorization',
        'root'
    );
    $user->validateUser();
}
