<?php
include 'src/core.php';
include "data/users.php";
include "data/passwords.php";
include "data/authtorization.php";
?>
<div class="header">
    <div class="logo"><img src="./i/logo.png" alt="Project"></div>
    <div class="author">Автор: <span class="author__name">Vladislav</span></div>
</div>

<div class="clear">
    <ul class="main-menu">
        <li><a href="#">Главная</a></li>
        <li><a href="route/about.php">О нас</a></li>
        <li><a href="#">Контакты</a></li>
        <li><a href="#">Новости</a></li>
        <li><a href="#">Каталог</a></li>
        <li><a href="#">Курсы</a></li>
        <li><a href="/?login=yes"><?= $authtirized ? 'Выйти'
                    : 'Авторизация' ?></a></li>
    </ul>
</div>