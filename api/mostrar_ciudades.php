<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once "conexion.php";  
    $my_query = "SELECT * FROM ciudad";
    $result = $mysql->query($my_query);
    
    $json = "{\"data\":[";
    if ($mysql->affected_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $json = $json . json_encode($row);
            $json = $json . ",";
        }
        $json = substr(trim($json), 0, -1);
    }
    $json = $json . "]}";
    echo $json;
    $mysql->close();
}
