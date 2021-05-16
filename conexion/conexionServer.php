<?php

$user = "root";
$pass = "";
$server = "localhost";
$db = "torneovoleibol";

//crearte connection
$conexion = mysqli_connect($server, $user, $pass, $db);

//Check connection
if (!$conexion) {
    echo "Error en la conexion servidor: ";
}

?>