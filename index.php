<?php

session_start();

require_once "classes/Conexao.php";

$pdo = Conexao::conectar();

if (empty($_SESSION["username"]) && empty($_SESSION["password"])){
    header("Location:login.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Gestão de Cursos</title>
</head>
<body class="index-body">
    <header class="header">
        <p class="logo">Gestão de Cursos</p>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="cursos.php">Cursos</a>
            <a href="alunos.php">Alunos</a>
            <button class="btn btn-warning" onclick="location.href='cadastrar.php'">Criar Administrador</button>
            <button class="btn btn-danger" onclick="location.href='logout.php'">Logout</button>
        </nav>
    </header>
    <h1>Sistema de <br>Gestão de Cursos</h1>

</body>
</html>