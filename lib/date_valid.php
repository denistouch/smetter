<?php
function dateValid($input)
{
    $year = substr($input, 0, 4);
    if ($year == 0 || $year > date('Y')) {
        return "0000-00-00";
    }
    $month = substr($input, 5, 2);
    if ($month == 0) {
        return "$year-01-01";
    }
    $day = substr($input, 8, 2);
    if ($day == 0) {
        return "$year-$month-01";
    }
    if (checkdate($month, $day, $year)) {
        return "$year-$month-$day";
    }
    // не стал описывать случай когда дата не существует(31 февраля)
}