<?php

require_once "config.php";
require_once "classes/Curso.php";
require_once "classes/CursoDAO.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Curso</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" required><br>

        <label for="duracao">Duração (Horas): </label>
        <input type="text" name="duracao" required><br>

        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" required><br>

        <input type="submit" value="Criar">

        <?php
        if (!empty($_POST)){
            $nome = $_POST['nome'];
            $duracao = $_POST['duracao'];
            $descricao = $_POST['descricao'];

            $stmt  = $pdo->prepare("INSERT INTO cursos(nome, duracao, descricao) VALUES (:NOME, :DURACAO, :DESCRICAO)");

            $stmt->bindValue(":NOME", $nome);
            $stmt->bindValue(":DURACAO", $duracao);
            $stmt->bindValue(":DESCRICAO", $descricao);

            $stmt->execute();
        }
        ?>

        <p><a href="cursos.php">Voltar á tabela de cursos</a></p>
    </form>
</body>
</html>