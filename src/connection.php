<?php
$host = "localhost";
$database = "planejar";
$user = "root";
$password = "";

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno)
    echo "Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
