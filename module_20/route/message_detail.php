<?php

$mail = new Mail('127.0.0.1', 'root', 'Faraonkill1', 'authorization');
$mail->updateMessageStatus();
$currentMessage = $mail->getDataOfCurrentMessage();
$sender = $mail->getDataOfSender($currentMessage);

?>
<br>
<h1 class="author__name"> <?= $currentMessage['title'] ?> </h1>
<p class="author__name"><?= $currentMessage['time'] ?></p>

<div class="author__name">

    <label>
        Отправитель:
    </label>
    <label>
        <?= $sender['surname'] . " " . $sender['name'] ?>
    </label>
    <br>
    <label>
        email:
    </label>
    <label>
        <?= $sender['email'] ?>
    </label>
    <br>
    <br>
    <lable>
        Сообщение:
    </lable>
    <p>
        <?= $currentMessage['text'] ?>
    </p>

</div>
