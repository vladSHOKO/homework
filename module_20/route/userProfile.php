<?php

$connect = databaseConnect(
    '127.0.0.1',
    'root',
    'Faraonkill1',
    'authorization'
);

$request = $connect->prepare(
    'select name as Имя, surname as Фамилия, father_name as Отчество, email as Почта, phone_number as Телефон from profiles where id = :id'
);
$request->execute(array('id' => $_SESSION['user_id']));
$result = $request->fetch(PDO::FETCH_ASSOC);

foreach ($result as $key => $row) {
    ?> <p class="author__name"><?php
        echo $key, ': ', $row; ?></p>
    <?php
}
?>
