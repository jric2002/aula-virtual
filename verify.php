<?php
    $user = $_GET["user"] ?? "undefined";
    $username = $_POST["username"] ?? "undefined";
    $password = $_POST["password"] ?? "undefined";
    if ($user == "professor" || $user == "student") {
        require_once "./database.php";
        $dbc = new DB();
        $db_connection = $dbc->connection();
        $table = ($user == "professor") ? 'professor' : 'student';
        $query = $db_connection->prepare('SELECT * FROM '.$table.' WHERE username = :username AND password = :password');
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($username == $result["username"] && $password == $result["password"]) {
            session_start();
            $_SESSION["user"] = $user;
            $_SESSION["username"] = $result["username"];
            $_SESSION["password"] = $result["password"];
            $location = ($user == "professor") ? "./professor.php" : "./student.php";
            header("Location: ./{$location}");
        }
        else {
            header("Location: ./login.php?user={$user}");
        }
    }
    else {
        header("Location: ./start.php");
    }
?>