<?php

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    require_once "conexion.php";
    $body_raw = file_get_contents('php://input');
    $body = json_decode($body_raw);
    $id = $body->id;

    $my_query = "DELETE FROM `empleado` WHERE id = $id;";
    $result = $mysql->query($my_query);
    if ($mysql->affected_rows > 0) {
        $json = "Empleado eliminado correctamente";
    } else {
        $json = "Error";
    }
    echo $json;
    $mysql->close();
}
