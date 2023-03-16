<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "conexion.php";
    $body_raw = file_get_contents('php://input');
    $body = json_decode($body_raw);
    $nombres = $body->nombres;
    $apellidos = $body->apellidos;
    $cargo = $body->cargo;
    $salario = $body->salario;

    $my_query = "INSERT INTO `empleado`(`nombres`, `apellidos`, `cargo`, `salario`) 
            VALUES ('$nombres','$apellidos', '$cargo', '$salario');";
    $result = $mysql->query($my_query);
    if ($mysql->affected_rows > 0) {
        $json = "Empleado agregado correctamente";
    } else {
        $json = "Error";
    }
    echo $json;
    $mysql->close();
}
