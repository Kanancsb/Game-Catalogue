<?php
    $servername = "localhost";
    $port = 8080;
    $username = "root";
    $password = "";
    $dbname = "dtom_catalog";

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->error) {
        die("Falha na conexão: " . $mysqli->error);
    }
?>