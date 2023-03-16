<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "conexion.php";
    $body_raw = file_get_contents('php://input');
    $body = json_decode($body_raw);
    $nombre = $body->nombre;
    $activo = $body->activo;

    $my_query = "INSERT INTO `ciudad`(`nombre`, `activo`) VALUES ('$nombre','$activo');";
    $result = $mysql->query($my_query);
    if ($mysql->affected_rows > 0) {
        $json = "Ciudad agregada correctamente";
    } else {
        $json = "Error";
    }
    echo $json;
    $mysql->close();
}
