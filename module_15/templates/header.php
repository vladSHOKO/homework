<?php

global $authorized;
global $menu;
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
            <li><?php
                if (isset($_SESSION['auth'])) {
                    ?><a href="/?action=logout&page=home"><span <?php
                                                                if (isset($_GET['action'])){
                                                                ?>class="underline" <?php
                    } ?>><?= 'Выйти' ?></span></a><?php
                } else {
                    ?>
                    <a href="/?action=login&page=home"><span <?php
                                                             if (isset($_GET['action'])){
                                                             ?>class="underline" <?php
                        } ?>><?= 'Авторизация' ?></span></a> <?php
                }
                ?>
            </li>
        </ul>
    </div>

</header>
