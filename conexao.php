<?php

$username = "root";
$password = "";
$database = "login_linkedin";
$hostname = "localhost";

$mysqli = new mysqli($hostname, $username, $password, $database);

if($mysqli->error) {
    exit("Falha ao conectar ao servidor. " . $mysqli->error);
}

?>