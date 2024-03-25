<?php

namespace Module\Twenty;

$mail = new MailRepository(Db::getConnection());
$mail->updateMessageStatus();
$currentMessage = $mail->getDataOfCurrentMessage($_GET['id'], $_SESSION['user_id']);
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
