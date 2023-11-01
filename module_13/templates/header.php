<?php

include 'src/core.php';

?>
<div class="header">
    <div class="logo"><img src="./i/logo.png" alt="Project"></div>
    <div class="author">Автор: <span class="author__name">Vladislav</span></div>
</div>

<div class="clear">
    <ul class="main-menu">
        <li><a href="/index.php">Главная</a></li>
        <li><a href="/route/about.php">О нас</a></li>
        <li><a href="/route/contacts.php">Контакты</a></li>
        <li><a href="/route/news.php">Новости</a></li>
        <li><a href="/route/catalog.php">Каталог</a></li>
        <li><a href="/route/kak_kupit_kursy.php">Курсы</a></li>
        <li><a href="/?login=yes"><?= $authtirized ? 'Выйти'
                    : 'Авторизация' ?></a></li>
    </ul>
</div>