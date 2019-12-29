<?php

define(servername, "localhost");
define(username, "smetter");
define(password, "Mozart184377!");
define(database, "smetter");

function insert_into_table($table_name = '', $values = '')
{
    $mysqli = new mysqli(servername, username, password, database);
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = "INSERT INTO " . $table_name . " VALUES " . $values;
    if (!$mysqli->query($query)) {
        echo "Не вставить данные: (" . $mysqli->errno . ") " . $mysqli->error;
    }
}

/**
 * Creating tables and insert rows from JSON file
 */
function create_workspace()
{
    //написать условие при котором этот скрипт выполняется
    echo "Connection...";
    $mysqli = new mysqli(servername, username, password, database);
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return;
    }
    echo "<br>Connected with " . database;

    $query = file_get_contents("sql/Laureates Schema.sql");
    if (!$mysqli->query($query)) {
        echo "Не удалось создать таблицу: (" . $mysqli->errno . ") " . $mysqli->error;
        return;
    }
    echo "<br>Laureates Schema.sql created";

    $query = file_get_contents("sql/Prizes Schema.sql");
    if (!$mysqli->query($query)) {
        echo "Не удалось создать таблицу: (" . $mysqli->errno . ") " . $mysqli->error;
        return;
    }
    echo "<br>Prizes Schema.sql created";

    $query = file_get_contents("sql/Affiliations Schema.sql");
    if (!$mysqli->query($query)) {
        echo "Не удалось создать таблицу: (" . $mysqli->errno . ") " . $mysqli->error;
        return;
    }
    echo "<br>Affiliations Schema.sql created";

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

function get_options($fieldName)
{
    $mysqli = new mysqli(servername, username, password, database);
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = '';
    switch ($fieldName) {
        case 'category':
            $query = file_get_contents('sql/Categories List.sql');
            break;
        case 'year':
            $query = file_get_contents('sql/Years List.sql');
            break;
        case 'country':
            $query = file_get_contents('sql/Countries List.sql');
            break;
    }
    $result = $mysqli->query($query);
    $data_array = array();
    foreach ($result->fetch_all() as $value) {
        $value[0] = "<option value='" . $value[0] . "'>" . $value[0] . "</option>";
        array_push($data_array, $value[0]);
    }
    return $data_array;
}

function get_table($category, $year, $country)
{
    $mysqli = new mysqli(servername, username, password, database);
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return;
    }
    if ($category == 'category') {
        $category = '%';
    }
    if ($year == 'year') {
        $year = '%';
    }
    if ($country == 'country') {
        $country = '%';
    }
    $query = file_get_contents('sql/Result in Table.sql');
    $query = str_replace(':year', $year, $query);
    $query = str_replace(':category', $category, $query);
    $query = str_replace(':country', $country, $query);
    $result = $mysqli->query($query);
    $data_array = array();
    foreach ($result->fetch_all() as $value) {
        $value = "<tr>
                <th scope=\"row\">
                    <button type=\"button\" class=\"btn btn-default\" data-laureate=\"#laureate".$value[0]."\">
                        <i class=\"fas fa-info-circle\"></i>
                    </button>
                </th>
                <td>$value[1]</td>
                <td>$value[2]</td>
                <td>$value[3]</td>
                <td>$value[4]</td>
                <td>$value[5]</td>
            </tr>";
        array_push($data_array, $value);
    }
    return $data_array;
}
