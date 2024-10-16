<?php

require_once "classes/Aluno.php";
require_once "classes/Conexao.php";
require_once "classes/CursoDAO.php";

$id = $_GET['id'];

$pdo = Conexao::conectar();

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
    <link rel="stylesheet" href="style/style.css">
    <title>Editar Aluno</title>
</head>
<div class="login-box">
    <body class="login-body">
        <form action="" method="post">

            <label for="id">Id: </label>
            <input class="input" type="text" value="<?php echo $_GET['id']?>" readonly><br>

            <label for="nome">Nome: </label>
            <input class="input" type="text" name="nome" value="<?php echo $dados['nome'] ?>" required><br>

            <label for="email">Email</label>
            <input class="input" type="email" name="email" value="<?php echo $dados['email']?>"required><br>

            <label for="telefone">Telefone: </label>
            <input class="input" type="number" name="telefone" value="<?php echo $dados['telefone']?>"required><br>

            <label for="id_curso">Curso: </label>
            <select name="curso" id="curso">
                <?php
                $curso = new CursoDAO();

                $cursos = $curso->read();
    
                if (!empty($cursos)) {
                ?>
                    <?php
                    foreach ($cursos as $curso) {
                    ?>
                <option value="<?php echo $curso["id"] ?>"><?php echo $curso["nome"] ?></option>
                <?php
                    }
                }
                ?>
            </select>

            <input class="add-btn" type="submit" value="Editar">
    </form>
    <div class="link">
        <p><a href="alunos.php">Voltar á tabela de alunos</a></p>
    </div>
</div>
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

        header('Location: alunos.php');
    }
    ?>

    
</body>
</html>