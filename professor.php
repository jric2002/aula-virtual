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
        $query = $db_connection->prepare('SELECT id_professor, username, name FROM professor WHERE username = :username');
        $query->bindParam(":username", $username);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $id_professor = $user["id_professor"];
        $username = $user["username"];
        $name = $user["name"];
        /* Obtenemos datos de la base de datos */
        $query = $db_connection->prepare('SELECT id_examen, title, description, number_questions FROM exam WHERE id_professor = :id_professor');
        $query->bindParam(":id_professor", $id_professor);
        $query->execute();
        $exams = $query->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
        <title>Aula Virtual - Docente</title>
        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="./css/professor.css"/>
    </head>
    <body>
        <div class="professor">
            <header class="header">
                <a href="./professor.php" class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                        <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                    </svg>
                </a>
                <div>
                    <h1><?php echo $name ?></h1>
                    <a href="./logout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                    </a>
            </header>
            <div class="exams">
                <div class="panel">
                    <h1>Evaluaciones</h1>
                    <div id="modal-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        <p>Agregar</p>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Número de preguntas</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($exams); $i++): ?>
                            <tr>
                                <?php foreach ($exams[$i] as $value): ?>
                                    <td><?php echo $value ?></td>
                                <?php endforeach ?>
                                <td>
                                    <a href="./edit_exam.php?id=<?php echo $exams[$i]["id_examen"] ?>" class="edit-exam">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <a href="./delete_exam.php?id=<?php echo $exams[$i]["id_examen"] ?>" class="delete-exam">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endfor ?>
                    </tbody>
                </table>
                <div class="modal" id="modal">
                    <form action="./add_exam.php" method="post">
                        <div class="title">
                            <input type="text" class="data" name="title" placeholder="Título de la evaluación" required/>
                        </div>
                        <div class="description">
                            <input type="text" class="data" name="description" placeholder="Descripción de la evaluación (opcional)"/>
                        </div>
                        <div class="number_questions">
                            <input type="number" class="data" name="number_questions" min="0" placeholder="Número de preguntas (opcional)"/>
                        </div>
                        <div class="question" id="question"></div>
                        <div class="add-question-button" id="add-question-button">Agregar pregunta</div>
                        <div class="submit">
                            <input type="submit" value="Guardar"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="./professor.js"></script>
    </body>
</html>