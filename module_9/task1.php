<?php

$line = 'Student, hello!';

foreach (count_chars($line, 1) as $key => $count) {
    echo chr($key), "- $count \n";
}
