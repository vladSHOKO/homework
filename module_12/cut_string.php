<?php

function cutString($line, $length, $appends)
{
    if (strlen($line) <= $length) {
        return $line;
    } else {
        $line = substr($line, 0, $length);
        $line = $line . $appends;
        return $line;
    }
}
