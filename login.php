<?php
    session_start();
    if (isset($_SESSION["user"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        $user = $_SESSION["user"];
        if ($user == "professor") {
            header("Location: ./professor.php");
        }
        else {
            header("Location: ./student.php");
        }
    }
    else {
        $user = $_GET["user"] ?? "undefined";
        $title = "undefined";
        if ($user == "professor") {
            $title = "Docente";
        }
        else if ($user == "student") {
            $title = "Estudiante";
        }
        else {
            header("Location: ./start.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
        <title>Aula Virtual - Login</title>
        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="./css/login.css"/>
    </head>
    <body>
        <div class="login">
            <header class="header">
                <a href="./start.php" class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                        <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                    </svg>
                </a>
                <h1>Aula Virtual</h1>
            </header>
            <div class="session">
                <form action="<?php echo "./verify.php?user={$user}" ?>" method="post">
                    <?php echo "<h1>{$title}</h1>" ?>
                    <div class="user">
                        <input type="text" name="username" placeholder="Usuario" required/>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </div>
                    <div class="password">
                        <input type="text" name="password" placeholder="Contraseña" required/>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                    </div>
                    <div class="button">
                        <input type="submit" value="Ingresar"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>