<?php

include "./src/core.php";
global $authorized;
global $menu;


?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>
<header>
    <div class="header">
        <div class="logo"><img src="/i/logo.png" alt="Project"></div>
        <div class="author">Автор: <span class="author__name">Vladislav</span>
        </div>
    </div>

    <div class="clear">
        <ul class="main-menu">
            <?php
            showMenu(arraySort($menu, 'sort', SORT_ASC), 16);
            ?>
            <li><a href="/?login=yes"><?= $authorized ? 'Выйти'
                        : 'Авторизация' ?></a></li>
        </ul>
    </div>

</header>