<?php

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    require_once "conexion.php";
    $body_raw = file_get_contents('php://input');
    $body = json_decode($body_raw);
    $id = $body->id;
    $nombres = $body->nombres;
    $apellidos = $body->apellidos;
    $cargo = $body->cargo;
    $salario = $body->salario;

    $my_query = "UPDATE `empleado` 
                 SET `nombres`='$nombres',`apellidos`='$apellidos', `cargo`='$cargo', `salario`='$salario' 
                 WHERE id = $id";
    $result = $mysql->query($my_query);
    if ($mysql->affected_rows > 0) {
        $json = "Empleado editado correctamente";
    } else {
        $json = "Ocurrió un error al editar el empleado con id: $id";
    }
    echo $json;
    $mysql->close();
}
