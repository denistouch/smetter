<?php
include 'print_lib.php';
include 'classes/connection.php';
include 'classes/Laureates.php';
//$connection = new Connection();
$separator = '';
for ($i = 0; $i < 100; $i++)
{
    $separator .= '-';
}
echo "<br>".$separator."<br>";
$json = file_get_contents("json/laureate.json");
$laureates = json_decode($json)->laureates;
$sql_values_array = array();
foreach ($laureates as $item){
    $person = new laureates($item);
    //$person->print_info();
    array_push($sql_values_array,$person->get_values_for_sql());
    //echo "<br>".$separator."<br>";
}
foreach ($sql_values_array as $value) {
    //echo $value;
    echo "<br>".$separator."<br>";
    insert_into_table("laureates",$value);
}
//insert_into_table("laureates",$sql_values_array[515]);
//echo $sql_values_array[515];
//print_r($sql_values_string);
//insert_into_table("laureates",$sql_values_string);
//echo $sql_values_string = addslashes($sql_values_string);
//$connection->insert_into_values($sql_values_string);

