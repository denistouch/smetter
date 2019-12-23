<?php
define(servername,"localhost");
define(username,"smetter");
define(password,"Mozart184377!");
define(database,"smetter");

//echo $mysqli->host_info . "\n";

function insert_into_table($table_name = '',$values = '')
{
    $mysqli = new mysqli(servername,username,password,database);
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = "INSERT INTO ".$table_name." VALUES ".$values;
    echo $query;
    //echo $mysqli->host_info . "\n";
    if (!$mysqli->query($query)) {
        echo "Не удалось создать таблицу: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}
//class Connection
//{
//private $servername = "localhost";
//private $database = "smetter";
//private $username = "smetter";
//private $password = "Mozart184377!";
//private $tablename = "laureates";
//private $connection = "";
//private $sql;
//
//public function __construct()
//{
//    $this->connection = mysqli_connect($this->servername,$this->username,$this->password,$this->database);
//    if (!$this->connection) {
//        die("Connection failed: " . mysqli_connect_error());
//    }
//        echo "Connection successfully";
//
//}
//
//public function insert_into_values($values_string)
//{
//    $this->sql = "INSERT INTO laureates(id,firstname,surname,born,died,bornCountry,bornCountryCode,bornCity,diedCountry,diedCountryCode,diedCity,diedCity) VALUES ".$values_string;
//    if (mysqli_query($this->connection,$this->sql)) {
//        echo  "Succes!";
//    } else {
//        echo "Error: " . /*$this->sql .*/ "<br>" . mysqli_error($this->connection);
//    }
//    mysqli_close($this->connection);
//}
//
//}