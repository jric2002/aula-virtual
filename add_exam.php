<?php
    session_start();
    if (!isset($_SESSION["user"]) && !isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
        header("Location: ./start.php");
    }
    else {
        require_once "database.php";
        $username = $_SESSION["username"];
        $db = new DB();
        $db_connection = $db->connection();
        /* Agregar datos a la base de datos */
        $title = $_POST["title"];
        $description = $_POST["description"];
        $number_questions = count($_POST);
        echo $number_questions;
    }
?>