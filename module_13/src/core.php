<?php

function arraySort(
    array $array,
    string $key = 'sort',
    int $sort = SORT_ASC
): array {
    for ($i = 0; $i < count($array); $i++) {
        for ($j = $i + 1; $j < count($array); $j++) {
            if ($sort == SORT_DESC) {
                $sortingType = $array[$j][$key] > $array[$i][$key];
            } else {
                $sortingType = $array[$j][$key] < $array[$i][$key];
            }
            if ($sortingType) {
                $tmp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $tmp;
            }
        }
    }
    return $array;
}

function cutString(string $line, int $length, string $appends): string
{
    if (iconv_strlen($line, 'utf-8') <= $length) {
        return $line;
    } else {
        $line = iconv_substr($line, 0, $length) . $appends;
        return $line;
    }
}

function pageTitle(array $menu): void
{
    foreach ($menu as $value) {
        if (isset($_GET['page'])
            && substr($value['path'], 7) == $_GET['page']
        ) {
            ?><h1 class="title"> <?= $value['title'] ?></h1> <?php
        }
    }
}

function showMenu(array $menu, int $fontSize): void
{
    foreach ($menu as $value) {
        if (isset($_GET['page'])
            && substr($value['path'], 7) == $_GET['page']
        ) {
            $underline = 'class="underline"';
        } else {
            $underline = null;
        }
        $template = '<li><a href="%s"><span %s>%s</span></a></li>';
        printf(
            $template,
            $value['path'],
            $underline,
            cutString($value['title'], 12, '...')
        );
    }
}
