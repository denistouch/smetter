<?php
if (isset($_POST)) {
    json_encode(delete_prize($_POST['id']));
}
function delete_prize($id) {
    define('root', $_SERVER['DOCUMENT_ROOT'] . '/smetter/');
    $mysqli = new mysqli("localhost", "smetter", "Mozart184377!", "smetter");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return;
    }
    $query = file_get_contents(root . 'sql/Delete Prize.sql');
    $query = str_replace(':id', $id, $query);
    $result = $mysqli->query($query);
    return $result;
}