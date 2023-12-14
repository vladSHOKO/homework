<?php

global $authorized;
global $menu;
?>
<footer>
    <div class="clearfix">
        <ul class="main-menu bottom">
            <?php
            showMenu(arraySort($menu, 'title', SORT_DESC), 12);
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


    <div class="footer">&copy;&nbsp;<nobr>2018</nobr>
        Project.
    </div>
</footer>
