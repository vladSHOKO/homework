<?php

function cutString(string $line, int $length, string $appends): string
{
    if (strlen($line) <= $length) {
        return $line;
    } else {
        $line = substr($line, 0, $length);
        $line = $line . $appends;
        return $line;
    }
}
