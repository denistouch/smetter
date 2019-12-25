<?php
function dateValidation($input)
{
//    if (strlen($input) != 10)
//        return $input;
    $year = substr($input,0,4);
    $month = substr($input,5,2);
    $day = substr($input,8,2);
    if ($year == 0 && $month == 0 && $day == 0) {
        echo "$year-$month-$day";
        return "$year-$month-$day";
    }
    if (checkdate($month,$day,$year)) {
        echo "$year-$month-$day";
        return "$year-$month-$day";
    }
    if ($year != 0) {
        $month = '01';
        $day = '01';
        echo "$year-$month-$day";
        return "$year-$month-$day";
    }
}