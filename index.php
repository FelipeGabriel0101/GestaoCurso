<?php

session_start();
ob_start();
require_once "classes/Curso.php";

if (empty($_SESSION["username"]) && empty($_SESSION["password"])){
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Gestão de Cursos</title>
</head>
<body>
    <p><a href="cursos.php">Cursos</a><br>
        <a href="alunos.php">Alunos</a><br>
        <a href="logout.php">Logout</a>
    </p>
</body>
</html>