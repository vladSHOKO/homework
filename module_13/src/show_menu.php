<?php

include "array_sort.php";
include "main_menu.php";

function showMenu(array $mainMenu, $key = 'sort', $sort = SORT_ASC){
    arraySort($mainMenu, $key, $sort);

    foreach ($mainMenu as $value){
?> <li><a href="<?php $mainMenu[$value]['path'] ?>"><?php $mainMenu[$value]['title'] ?></a></li> <?php
    }


}
