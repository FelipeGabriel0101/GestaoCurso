<?php

require_once "classes/Curso.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome"><br>

        <label for="duracao">Duração (Horas): </label>
        <input type="text" name="duracao"><br>

        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao"><br>

        <input type="submit" value="Editar">
    </form>

    <?php
    if (!empty($_POST)){

        $nome = $_POST["nome"];
        $duracao = $_POST["duracao"];
        $descricao = $_POST["descricao"];
    }
    ?>

</body>
</html>