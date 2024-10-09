<?php

require_once "classes/Conexao.php";
require_once "classes/AlunoDAO.php";
require_once "classes/CursoDAO.php";

$pdo = Conexao::conectar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Criar Aluno</title>
</head>
<body class="login-body">
    <div class="login-box">
        <form action="" method="post">
            <label for="nome">Nome: </label>
            <input class="input" type="text" name="nome" required><br>

            <label for="email">Email: </label>
            <input class="input" type="text" name="email" required><br>

            <label for="telefone">Telefone: </label>
            <input class="input" type="number" name="telefone" required><br>

            <label for="id_curso2">ID curso: </label>
            
            <select name="id_curso" id="id_curso">
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

            <input class="add-btn" type="submit" value="Criar">

            <div class="link">
                <a href="alunos.php">Voltar á tabela de alunos</a>
            </div>
        </form>
    </div>
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

    
</body>
</html>