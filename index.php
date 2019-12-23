<?php
include 'print_lib.php';
include 'connection.php';
include 'laureates.php';
$separator = '';
for ($i = 0; $i < 100; $i++)
{
    $separator .= '-';
}
$json = file_get_contents("laureate.json");
$laureates = json_decode($json)->laureates;
foreach ($laureates as $item){
    $person = new laureates($item);
    $person->print_info();
    echo "<br>".$separator."<br>";
}
