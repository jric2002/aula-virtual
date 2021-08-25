<?php
    session_start();
    if (!isset($_SESSION["user"]) && !isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
        header("Location: ./start.php");
    }
    else {
        require_once "./database.php";
        $username = $_SESSION["username"];
        $password = $_SESSION["password"];
        $db = new DB();
        $db_connection = $db->connection();
        $query = $db_connection->prepare('SELECT id_professor FROM professor WHERE username = :username AND password = :password');
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->execute();
        $id_professor = $query->fetch(PDO::FETCH_ASSOC);
        /* Eliminar datos de la tabla exam */
        $id_examen = $_GET["id"];
        $query = $db_connection->prepare('DELETE FROM exam WHERE id_professor = :id_professor AND id_examen = :id_examen');
        $query->bindParam(":id_professor", $id_professor["id_professor"]);
        $query->bindParam(":id_examen", $id_examen);
        $status = $query->execute();
        if ($status) {
            header("Location: ./professor.php");
        }
        else {
            echo "Ha ocurrido un error, vuelve a intentarlo más tarde.";
        }
    }
?>