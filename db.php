<?php
    $servername = "localhost";
    $username = "robert";
    $password = "clave123";
    $dbname = "negociosweb";
    $conn;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
