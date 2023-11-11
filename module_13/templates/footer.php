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
            <li><a href="/?login=yes"><?= $authorized
                        ? 'Выйти'
                        : 'Авторизация' ?></a></li>
        </ul>
    </div>


    <div class="footer">&copy;&nbsp;<nobr>2018</nobr>
        Project.
    </div>
</footer>
