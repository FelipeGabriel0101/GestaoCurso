<?php

require_once "classes/Conexao.php";
require_once "classes/AlunoDAO.php";

$pdo = Conexao::conectar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Aluno</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" required><br>

        <label for="email">Email: </label>
        <input type="text" name="email" required><br>

        <label for="telefone">Telefone: </label>
        <input type="number" name="telefone" required><br>

        <label for="id_curso">ID curso: </label>
        <input type="number" name="id_curso" required><br>

        <input type="submit" value="Criar">
    </form>
    <?php
        if (!empty($_POST)){
            try {

                $aluno = new Aluno(null, $_POST["nome"], $_POST["email"], $_POST["telefone"], $_POST["id_curso"]);

            $alunoDAO = new AlunoDAO();

            $alunoDAO->create($aluno);

            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    ?>

    <p><a href="alunos.php">Voltar á tabela de alunos</a></p>
</body>
</html>