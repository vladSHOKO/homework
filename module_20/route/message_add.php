<?php

namespace Module\Twenty;

$mail = new MailRepository(Db::getConnection());
$mail->insertMessage();

?>

<form action="/?page=add" method="post">
    <table width="100%" border="0" cellspacing="0"
           cellpadding="0">
        <tr>
            <td class="iat">
                <label for="login_id">Заголовок письма</label>
                <input id="login_id" size="30" name="message_title">
            </td>
        </tr>
        <tr>
            <td class="iat">
                <label for="password_id">Текст письма</label>
                <input id="password_id" size="30"
                       name="message_text"
                       type="text">
            </td>
        </tr>
        <tr>
            <td class="iat">
                <label for="fruits">Выберите получателя</label>
                <select name="recipient">
                    <?php
                    $recipients = $mail->getListOfRecipients();
                    foreach ($recipients as $recipient) { ?>
                        <option
                            value="<?= $recipient['id'] ?>"><?= $recipient['surname'], ' ', $recipient['name'] ?></option>
                        <?php
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Отправить"></td>
        </tr>
    </table>
</form>
