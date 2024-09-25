<?php

require_once "classes/Aluno.php";
require_once "config.php";

$id = $_GET['id'];

try{
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = :ID");

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
    <title>Editar Aluno</title>
</head>
<body>
    <form action="" method="post">

        <label for="id">Id: </label>
        <input type="text" value="<?php echo $_GET['id']?>" readonly><br>

        <label for="nome">Nome: </label>
        <input type="text" name="nome" value="<?php echo $dados['nome'] ?>" required><br>

        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo $dados['email']?>"required><br>

        <label for="telefone">Telefone: </label>
        <input type="number" name="telefone" value="<?php echo $dados['telefone']?>"required><br>

        <label for="id_curso">ID curso: </label>
        <input type="number" name="id_curso" value="<?php echo $dados['id_curso'] ?>"><br>

        <input type="submit" value="Editar">
</form>
<?php
    if (!empty($_POST)){

        $id = $_GET["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $id_curso = $_POST["id_curso"];

        $sql = "UPDATE alunos SET nome = :NOME, email = :EMAIL, telefone = :TELEFONE, id_curso = :ID_CURSO WHERE
            id = :ID";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(":NOME", $nome);
        $stmt->bindValue(":EMAIL", $email);
        $stmt->bindValue(":TELEFONE", $telefone);
        $stmt->bindValue(":ID", $id);
        $stmt->bindValue(":ID_CURSO", $id_curso);


        $stmt->execute();
    }
    ?>

    <p><a href="alunos.php">Voltar á tabela de alunos</a></p>
</body>
</html>