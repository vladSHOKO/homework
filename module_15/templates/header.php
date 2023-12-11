<?php

include "./src/core.php";
global $authorized;
global $menu;
if (isset($_COOKIE['login']) && isset($_COOKIE['password']) && !isset($_COOKIE['PHPSESSID'])){
    sessionInitialization();
}
$_SESSION['authorized'] = true;

?>

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
            <li><a href="/?login=yes"><span <?php
                                            if (isset($_GET['login'])){
                                            ?>class="underline" <?php
                    } ?>><?= isset($_SESSION['authorized']) ? 'Выйти' : 'Авторизация' ?></span></a>
            </li>
        </ul>
    </div>

</header>
