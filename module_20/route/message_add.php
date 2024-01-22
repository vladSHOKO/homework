<?php

$connect = databaseConnect(
    '127.0.0.1',
    'root',
    'Faraonkill1',
    'authorization'
);

$request = $connect->query(
    'select id, name, surname from profiles order by surname desc'
);
insertMessage($connect);

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
                    while ($row = $request->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option
                            value="<?= $row['id'] ?>"><?= $row['surname'], ' ', $row['name'] ?></option>
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
