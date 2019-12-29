<?php
if (isset($_POST)) {
    define('root', $_SERVER['DOCUMENT_ROOT'] . '/smetter/');
    echo json_encode(get_modal($_POST['id']));
//    print_r(get_prizes($_POST['id']));
}
function get_modal($id)
{
    $mysqli = new mysqli("localhost", "smetter", "Mozart184377!", "smetter");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return;
    }
    $query = file_get_contents(root . 'sql/Laureate.sql');
    $query = str_replace(':id', $id, $query);
    $result = $mysqli->query($query);
    $data_array = array();
    foreach ($result->fetch_all() as $value) {
        if ($value[4] == '0000-00-00')
            $value[4] = '';
        $value = "
<div class=\"modal fade\" id=\"laureate\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"laureateLabel\"
     aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"laureateLabel\">" . $value[1] . " " . $value[2] . "<br> id: " . $value[0] . "</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-sm\">
                            <h1>" . $value[1] . " " . $value[2] . "</h1>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-sm\">
                            <ul class=\"list-group\">
                                <li class=\"list-group-item\">
                                    name <span class=\"badge badge-pill\">" . $value[1] . "</span>
                                </li>
                                <li class=\"list-group-item\">
                                    surname <span class=\"badge  badge-pill\">" . $value[2] . "</span></li>
                                <li class=\"list-group-item\">
                                    born <span class=\"badge  badge-pill\">" . $value[3] . "</span>
                                </li>
                                <li class=\"list-group-item\">
                                    bornCountry <span class=\"badge  badge-pill\">" . $value[5] . "</span>
                                </li>
                                <li class=\"list-group-item\">
                                    bornCountryCode <span class=\"badge  badge-pill\">" . $value[6] . "</span>
                                </li>
                                <li class=\"list-group-item\">
                                    bornCity <span class=\"badge  badge-pill\">" . $value[7] . "</span>
                                </li>
                                <li class=\"list-group-item\">
                                    died <span class=\"badge  badge-pill\">" . $value[4] . "</span>
                                </li>
                                <li class=\"list-group-item\">
                                    diedCountry <span class=\"badge  badge-pill\">" . $value[8] . "</span>
                                </li>
                                <li class=\"list-group-item\">
                                    diedCountryCode <span class=\"badge  badge-pill\">" . $value[9] . "</span>
                                </li>
                                <li class=\"list-group-item\">
                                    diedCity <span class=\"badge  badge-pill\">" . $value[10] . "</span>
                                </li>
                                <li class=\"list-group-item\">
                                    gender <span class=\"badge  badge-pill\">" . $value[11] . "</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"row\" id=\"prizes\">
                    <h2>Prizes</h2>";
        foreach (get_prizes($id) as $prize) {
            $value .= $prize;
        }
        $value .= "</div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                <button type=\"button\" class=\"btn btn-primary\">Edit</button>
            </div>
        </div>
    </div>
</div>
";
        array_push($data_array, $value);
    }
    return $data_array;
}

function get_prizes($id)
{
    $mysqli = new mysqli("localhost", "smetter", "Mozart184377!", "smetter");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return;
    }
    $query = file_get_contents(root . 'sql/Laureate Prize.sql');
    $query = str_replace(':id', $id, $query);
    $result = $mysqli->query($query);
    $data_array = array();
    $i = 0;
    foreach ($result->fetch_all() as $value) {
        $value = "<div class=\"col-sm\">
        <div class=\"prize\">
            <h5>Year : " . $value[1] . "</h5>
            <ul class=\"list-group\">
                <li class=\"list-group-item\">
                    year <span class=\"badge  badge-pill\">" . $value[1] . "</span>
                </li>
                <li class=\"list-group-item\">
                    category <span class=\"badge  badge-pill\">" . $value[2] . "</span>
                </li>
                <li class=\"list-group-item\">
                    share <span class=\"badge  badge-pill\">" . $value[3] . "</span>
                </li>
                <li class=\"list-group-item\">
                    motivation : " . $value[4] . "
                </li>
            </ul>";
        foreach (get_affilliation($id,$i) as $item){
            $value .= $item;
        }
        $value .=
            "</div>
    </div>";
        array_push($data_array, $value);
        $i++;
    }
    return $data_array;
}

function get_affilliation($id, $number)
{
    $mysqli = new mysqli("localhost", "smetter", "Mozart184377!", "smetter");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return;
    }
    $query = file_get_contents(root . 'sql/Laureate Prize Affiliation.sql');
    $query = str_replace(':id', $id, $query);
    $query = str_replace(':number', $number, $query);
    $result = $mysqli->query($query);
    $data_array = array();
    foreach ($result->fetch_all() as $value) {
        $value = "<div class=\"affiliation\">
                <h5>Affiliation : </h5>
                <ul class=\"list-group\">
                    <li class=\"list-group-item\">
                        name <span class=\"badge  badge-pill\">" . $value[1] . "</span>
                    </li>
                    <li class=\"list-group-item\">
                        city <span class=\"badge  badge-pill\">" . $value[2] . "</span>
                    </li>
                    <li class=\"list-group-item\">
                        country <span class=\"badge  badge-pill\">" . $value[3] . "</span>
                    </li>
                </ul>
            </div>";
        array_push($data_array, $value);
    }
    return $data_array;
}
?>
