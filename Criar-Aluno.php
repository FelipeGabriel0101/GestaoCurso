<?php

require_once "config.php";

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
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $id_curso = $_POST["id_curso"];

            $stmt = $pdo->prepare("INSERT INTO alunos(nome, email, telefone, id_curso) VALUES (:NOME, :EMAIL, :TELEFONE, :ID_CURSO)");

            $stmt->bindValue(":NOME", $nome);
            $stmt->bindValue(":EMAIL", $email);
            $stmt->bindValue(":TELEFONE", $telefone);
            $stmt->bindValue(":ID_CURSO", $id_curso);

            $stmt->execute();
        }
    ?>

    <p><a href="alunos.php">Voltar á tabela de alunos</a></p>
</body>
</html>