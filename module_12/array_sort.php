<?php

function arraySort(array $array, string $key = 'sort', int $sort = SORT_ASC): array
{
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
