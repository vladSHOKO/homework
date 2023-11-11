<?php

function pageTitle(array $menu): void
{
    foreach ($menu as $value) {
        if (substr($value['path'], 7) == substr($_SERVER['PHP_SELF'], 7)) {
            ?><H1> <?= $value['title'] ?></H1> <?php
        }
    }
}


