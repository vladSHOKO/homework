<?php

function arraySort(array $array, $key = 'sort', $sort = SORT_ASC): array
{
    if ($sort == SORT_DESC) {
        for ($i = 0; $i < count($array); $i++) {
            for ($j = $i + 1; $j < count($array); $j++) {
                if ($array[$j][$key] > $array[$i][$key]) {
                    $tmp = $array[$j];
                    $array[$j] = $array[$i];
                    $array[$i] = $tmp;
                }
            }
        }
    } else {
        for ($i = 0; $i < count($array); $i++) {
            for ($j = $i + 1; $j < count($array); $j++) {
                if ($array[$j][$key] < $array[$i][$key]) {
                    $tmp = $array[$j];
                    $array[$j] = $array[$i];
                    $array[$i] = $tmp;
                }
            }
        }
    }

    return $array;
}

