<?php

require_once "classes/CursoDAO.php";
require_once "classes/Curso.php";

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

    CursoDAO::delete($_GET['id']);

    ?>
    <p><a href="cursos.php">Voltar á tabela de cursos</a></p>
</body>
</html>