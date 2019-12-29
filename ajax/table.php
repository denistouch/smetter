<?php

if (isset($_POST)) {
    define('root', $_SERVER['DOCUMENT_ROOT'] . '/smetter/');
    echo json_encode(get_table($_POST['category'], $_POST['year'], $_POST['country'], $_POST['start']));
}
function get_table($category, $year, $country, $start = 0)
{
    $mysqli = new mysqli("localhost", "smetter", "Mozart184377!", "smetter");
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
    $query = file_get_contents(root . 'sql/Result in Table.sql');
    $query = str_replace(':year', $year, $query);
    $query = str_replace(':category', $category, $query);
    $query = str_replace(':country', $country, $query);
    $query = str_replace(':start', $start, $query);
    $result = $mysqli->query($query);
    $data_array = array();
    foreach ($result->fetch_all() as $value) {
        $value = "<tr>
                <th scope=\"row\">
                    <button type=\"button\" class=\"btn btn-default\" data-laureate=\"" . $value[0] . "\">
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
    if (count($data_array) < 50){
        return $data_array;
    }
    $moreButton = "<button type=\"button\" class=\"btn btn-dark btn-block\" data-start=\"" . ($start + 50) . "\">
                        <i class=\"fas fa-arrow-circle-down\"></i>
                    </button>";
    array_push($data_array,$moreButton);
    return $data_array;
}