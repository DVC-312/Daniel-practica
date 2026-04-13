<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "bdatos";

$conex = new mysqli($host, $user, $pass, $db);

if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}
?>