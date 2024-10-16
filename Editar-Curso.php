<?php

require_once "classes/Curso.php";
require_once "classes/CursoDAO.php";
require_once "classes/Conexao.php";

$id = $_GET['id'];

$pdo = Conexao::conectar();

try{
    $stmt = $pdo->prepare("SELECT * FROM cursos WHERE id = :ID");

    $stmt->bindValue(":ID", $id);
    $stmt->execute();
    
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

} catch(PDOException $e){
    echo $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Editar Curso</title>
</head>
<body class="login-body">
    <div class="login-box">
    <form action="" method="post">

        <label for="id">Id: </label>
        <input class="input" type="text" value="<?php echo $_GET['id']?>" readonly><br>

        <label for="nome">Nome: </label>
        <input class="input" type="text" name="nome" value="<?php echo $dados['nome'] ?>" required><br>

        <label for="duracao">Duração (Horas): </label>
        <input class="input" type="text" name="duracao" value="<?php echo $dados['duracao']?>"required><br>

        <label for="descricao">Descrição: </label>
        <input class="input" type="text" name="descricao" value="<?php echo $dados['descricao']?>"required><br>

        <input class="add-btn" type="submit" value="Editar">
    </form>

    <?php
    if (!empty($_POST)){

        $curso = new Curso($_GET['id'], $_POST['nome'], $_POST['duracao'], $_POST['descricao']);
                
        $cursoDAO = new CursoDAO();

        $cursoDAO->update($curso);

        header('Location: cursos.php');
    }
    ?>
        <div>
            <p class="link"><a href="cursos.php">Voltar á tabela de cursos</a></p>
        </div>
    </div>
</body>
</html>