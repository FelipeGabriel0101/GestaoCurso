<?php

require_once "classes/CursoDAO.php";
require_once "classes/Curso.php";
require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Curso</title>
</head>
<body>
    <?php

    $id = $_GET["id"];

    $stmt = $pdo->prepare("DELETE FROM cursos WHERE id = :ID");

    $stmt->bindValue(":ID", $id);

    $stmt->execute();

    echo "Registro excluído com sucesso!";
    ?>

    <p><a href="cursos.php">Voltar á tabela de cursos</a></p>
</body>
</html>