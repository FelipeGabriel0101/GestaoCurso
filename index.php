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
    <header class="header">
        <a href="" class="logo">Logo</a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="cursos.php">Cursos</a>
            <a href="alunos.php">Alunos</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

</body>
</html>