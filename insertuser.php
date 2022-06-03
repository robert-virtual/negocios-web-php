<?php

    require 'db.php';
    if (isset($_POST["name"])) {
        if ($_POST["password"] != $_POST["confirm_password"]) {
            die("Passwords do not match");
        }
        try {
            $stmt = $conn->prepare("INSERT INTO users(cedula,name,email,password) values(:cedula,:name,:email,:password)");
            unset($_POST["confirm_passsword"]);
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $stmt->bindParam(":cedula", $_POST["cedula"]);
            $stmt->bindParam(":name", $_POST["name"]);
            $stmt->bindParam(":email", $_POST["email"]);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            header("Location: /");
            die();
        } catch (PDOException $e) {
            echo "Error al insertar el usuario: $e";
        }
    }


?>
