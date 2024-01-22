<?php

$connect = databaseConnect(
    '127.0.0.1',
    'root',
    'Faraonkill1',
    'authorization'
);

updateMessageStatus($connect);
$result_message = selectCurrentMessage($connect);
$result_sender = selectCurrentSender($connect, $result_message);

?>
<br>
<h1 class="author__name"> <?= $result_message['title'] ?> </h1>
<p class="author__name"><?= $result_message['time'] ?></p>

<div class="author__name">

    <label>
        Отправитель:
    </label>
    <label>
        <?= $result_sender['surname'] . " " . $result_sender['name'] ?>
    </label>
    <br>
    <label>
        email:
    </label>
    <label>
        <?= $result_sender['email'] ?>
    </label>
    <br>
    <br>
    <lable>
        Сообщение:
    </lable>
    <p>
        <?= $result_message['text'] ?>
    </p>

</div>
