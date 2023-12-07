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
            <li><a href="/?login=yes"><span <?php
                                            if (isset($_GET['login'])){
                                            ?>class="underline" <?php
                    } ?>><?= $authorized ? 'Выйти' : 'Авторизация' ?></span></a>
            </li>
        </ul>
    </div>


    <div class="footer">&copy;&nbsp;<nobr>2018</nobr>
        Project.
    </div>
</footer>
