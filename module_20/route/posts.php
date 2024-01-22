<?php

$connect = databaseConnect(
    '127.0.0.1',
    'root',
    'Faraonkill1',
    'authorization'
);

$request = $connect->prepare('select * from messages where recipient_id = ?');
$request->execute(array($_SESSION['user_id']));
$results = [];
while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
    $results[$row['id']] = $row;
}
?>

<a href="/?page=add">Написать сообщение</a>

<p class="author__name">Непрочитанные письма</p>

<ul class="author__name"> <?php
    foreach ($results as $result) {
        if ($result['readed'] == 0) {
            ?>
            <li>
                <a href="/?page=detail&id=<?= $result['id'] ?>">
                    <?= $result['title'] ?>
                </a>
            </li>
            <?php
        }
    } ?>
</ul>

<p class="author__name">Прочитанные письма</p>

<ul class="author__name">
    <?php
    foreach ($results as $result) {
        if ($result['readed'] == 1) {
            ?>
            <li>
                <a href="/?page=detail&id=<?= $result['id'] ?>">
                    <?= $result['title'] ?>
                </a>
            </li>
            <?php
        }
    } ?>
</ul>


