<?php

require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    AlunoDAO::delete($_GET['id']);
    
    echo "Registro deletado com sucesso!";
    ?>

    <p><a href="alunos.php">Voltar á tabela de alunos</a></p>
</body>
</html>