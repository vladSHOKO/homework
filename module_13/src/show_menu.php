<?php

function showMenu(array $menu, int $fontSize): void
{
    foreach ($menu as $value) {
        if (substr($value['path'], 7) == substr($_SERVER['PHP_SELF'], 7)) {
            $underline = 'class="underline"';
        } else {
            $underline = null;
        }
        $template = '<li><a href="%s"><span %s>%s</span></a></li>';
        printf($template, $value['path'], $underline, $value['title']);
    }
}
