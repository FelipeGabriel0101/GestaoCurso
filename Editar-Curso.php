<?php

require_once "classes/Curso.php";
require_once "config.php";

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

        <label for="id">Id: </label>
        <input type="text" value="<?php echo $_GET['id']?>" readonly><br>

        <label for="nome">Nome: </label>
        <input type="text" name="nome" required><br>

        <label for="duracao">Duração (Horas): </label>
        <input type="text" name="duracao" required><br>

        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" required><br>

        <input type="submit" value="Editar">
    </form>

    <?php
    if (!empty($_POST)){

        $id = $_GET["id"];
        $nome = $_POST["nome"];
        $duracao = $_POST["duracao"];
        $descricao = $_POST["descricao"];

        $sql = "UPDATE cursos SET nome = :NOME, duracao = :DURACAO, descricao = :DESCRICAO WHERE
            id = :ID";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(":NOME", $nome);
        $stmt->bindValue(":DURACAO", $duracao);
        $stmt->bindValue(":DESCRICAO", $descricao);
        $stmt->bindValue(":ID", $id);

        $stmt->execute();
    }
    ?>

    <p><a href="cursos.php">Voltar á tabela de cursos</a></p>

</body>
</html>