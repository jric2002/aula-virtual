<?php
    session_start();
    if (!isset($_SESSION["user"]) && !isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
        header("Location: ./start.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
        <title>Aula Virtual - Estudiante</title>
        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="./css/student.css"/>
    </head>
    <body>
        <div class="student">
            <h1>Estudiante</h1>
            <a href="./logout.php">Salir</a>
        </div>
    </body>
</html>