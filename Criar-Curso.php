<?php

require_once "classes/Curso.php";
require_once "classes/CursoDAO.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome"><br>

        <label for="duracao">Duração (Horas): </label>
        <input type="text" name="duracao"><br>

        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao"><br>

        <input type="submit" value="Criar">

        <?php
        $curso = new Curso($_POST['nome'], $_POST['duracao'], $_POST['descricao']);
        
        $cursos = $curso->create();

        if (!empty($cursos)){

            foreach ($cursos as $curso){

            }
        }
        ?>
    </form>
</body>
</html>