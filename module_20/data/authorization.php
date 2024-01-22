<?php


/*if (isset($_POST['login']) && isset($_POST['password'])) {
    $preparedUsers = array_flip($users);
    $key = $preparedUsers[$_POST['login']] ?? null;
    if ($key !== null) {
        $_SESSION['auth'] = $passwords[$key] === $_POST['password'];;
    }
}
*/

if (isset($_POST['login']) && isset($_POST['password'])) {
    $connect = databaseConnect(
        '127.0.0.1',
        'root',
        'Faraonkill1',
        'authorization'
    );
    $request = $connect->prepare('SELECT * FROM users WHERE login = :login');
    $request->execute(
        array('login' => $_POST['login'])
    );
    foreach ($request as $row) {
        if (isset($row) and password_verify(
                $_POST['password'],
                $row['password']
            )
        ) {
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $row['id'];
        }
    }
}
