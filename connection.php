<?php
$servername = "localhost";
$database = "smetter";
$username = "smetter";
$password = "Mozart184377!";

$connection = mysqli_connect($servername,$username,$password,$database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connection successfully";
