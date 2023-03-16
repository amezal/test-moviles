<?php

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    require_once "conexion.php";
    $body_raw = file_get_contents('php://input');
    $body = json_decode($body_raw);
    $id = $body->id;
    $nombre = $body->nombre;
    $activo = $body->activo;

    $my_query = "UPDATE `ciudad` 
                 SET `nombre`='$nombre',`activo`='$activo' 
                 WHERE id = $id";
    $result = $mysql->query($my_query);
    if ($mysql->affected_rows > 0) {
        $json = "Ciudad editada correctamente";
    } else {
        $json = "Ocurrió un error al editar la ciudad con id: $id";
    }
    echo $json;
    $mysql->close();
}
