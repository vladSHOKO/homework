<?php

namespace Module\Twenty;

$mail = new MailRepository(Db::getConnection());
$messageList = $mail->getMessageList($_SESSION['user_id']);

?>

<a href="/?page=add">Написать сообщение</a>

<p class="author__name">Непрочитанные письма</p>

<ul class="author__name"> <?php
    foreach ($messageList as $message) {
        if ($message['readed'] == 0) {
            ?>
            <li>
                <a href="/?page=detail&id=<?= $message['id'] ?>">
                    <?= $message['title'] ?>
                </a>
            </li>
            <?php
        }
    } ?>
</ul>

<p class="author__name">Прочитанные письма</p>

<ul class="author__name">
    <?php
    foreach ($messageList as $message) {
        if ($message['readed'] == 1) {
            ?>
            <li>
                <a href="/?page=detail&id=<?= $message['id'] ?>">
                    <?= $message['title'] ?>
                </a>
            </li>
            <?php
        }
    } ?>
</ul>
