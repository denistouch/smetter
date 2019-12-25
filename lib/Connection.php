<?php

define(servername,"localhost");
define(username,"smetter");
define(password,"Mozart184377!");
define(database,"smetter");

function insert_into_table($table_name = '',$values = '')
{
    $mysqli = new mysqli(servername,username,password,database);
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = "INSERT INTO ".$table_name." VALUES ".$values;
    if (!$mysqli->query($query)) {
        echo "Не вставить данные: (" . $mysqli->errno . ") " . $mysqli->error;
    }
}

/**
 * Creating tables and insert rows from JSON file
 */
function create_workspace() {
    echo "Connection...";
    $mysqli = new mysqli(servername,username,password,database);
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return;
    }
    echo "<br>Connected with ".database;

    $query = file_get_contents("sql/Laureates Schema");
    if (!$mysqli->query($query)) {
        echo "Не удалось создать таблицу: (" . $mysqli->errno . ") " . $mysqli->error;
        return;
    }
    echo "<br>Laureates Schema created";

    $query = file_get_contents("sql/Prizes Schema");
    if (!$mysqli->query($query)) {
        echo "Не удалось создать таблицу: (" . $mysqli->errno . ") " . $mysqli->error;
        return;
    }
    echo "<br>Prizes Schema created";

    $query = file_get_contents("sql/Affiliations Schema");
    if (!$mysqli->query($query)) {
        echo "Не удалось создать таблицу: (" . $mysqli->errno . ") " . $mysqli->error;
        return;
    }
    echo "<br>Affiliations Schema created";

    $json = file_get_contents("json/laureate.json");
    $input = json_decode($json)->laureates;
    $sql_laureates_values_array = array();
    $sql_prizes_values_array = array();
    $sql_affiliations_values_array = array();
    foreach ($input as $item) {
        $person = new Laureate($item);
        array_push($sql_laureates_values_array, $person->get_values_for_sql());
        foreach ($person->getPrizes() as $prize) {
            array_push($sql_prizes_values_array, $prize->get_values_for_sql());
            foreach ($prize->getAffiliations() as $affiliation) {
                array_push($sql_affiliations_values_array, $affiliation->get_values_for_sql());
            }
        }
    }

    foreach ($sql_laureates_values_array as $value) {
        insert_into_table("laureates", $value);
    }
    echo "<br>Laureates rows inserted";

    foreach ($sql_prizes_values_array as $value) {
        insert_into_table("prizes", $value);
    }
    echo "<br>Prizes rows inserted";

    foreach ($sql_affiliations_values_array as $value) {
        insert_into_table("affiliations", $value);
    }
    echo "<br>Affiliations rows inserted";

    echo '<br>Success!';
}
