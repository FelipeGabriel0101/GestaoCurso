<?php

require_once "classes/Curso.php";
require_once "classes/CursoDAO.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Criar Curso</title>
    
</head>
<body class="login-body">
    <div class="login-box">
        <form action="" method="post">
            <label for="nome">Nome: </label>
            <input class="input" type="text" name="nome" required><br>

            <label for="duracao">Duração (Horas): </label>
            <input class="input" type="number" name="duracao" required><br>

            <label for="descricao">Descrição: </label>
            <input class="input" type="text" name="descricao" required><br>

            <input class="add-btn" type="submit" value="Criar">

            <?php
            if (!empty($_POST)){

                $curso = new Curso(null, $_POST['nome'], $_POST['duracao'], $_POST['descricao']);

                $cursoDAO = new CursoDAO();

                $cursoDAO->create($curso);
            }
            ?>
            <div class="link">
                <a href="cursos.php">Voltar á tabela de cursos</a>
            </div>
        </form>
    </div>
</body>
</html>