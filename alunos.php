<?php

require_once "classes/AlunoDAO.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Alunos</title>
</head>
<body>
    <header class="header">
        <p class="logo">Gestão de Cursos</p>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="cursos.php">Cursos</a>
            <a href="alunos.php">Alunos</a>
            <button class="btn btn-warning" onclick="location.href='cadastrar.php'">Criar Administrador</button>
            <button class="btn btn-danger" onclick="location.href='logout.php'">Logout</button>
        </nav>
    </header>

    <h2>Alunos</h2>
    <hr>
    <button class="btn btn-success" onclick="location.href='Criar-Aluno.php'">Criar Novo Aluno</button>
    <table class="table-layout">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>ID Curso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $aluno = new AlunoDAO();

            $alunos = $aluno->read();

            if (!empty($alunos)) {

                foreach ($alunos as $aluno) {
                ?>
                <tr>
                    <td><?php echo $aluno['id']; ?></td>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['email']; ?></td>
                    <td><?php echo $aluno['telefone']; ?></td>
                    <td><?php echo $aluno['id_curso']; ?></td>
                    <td>
                        <button class="btn btn-warning" onclick="location.href='Editar-Aluno.php?id=<?php echo $aluno['id']; ?>'">Editar</button>
                        <button class="btn btn-danger" onclick="location.href='Excluir-Aluno.php?id=<?php echo $aluno['id']; ?>'">Excluir </button>
                    </td>
                </tr>
                <?php
                }
            } else {
                echo "Nenhum registro encontrado.";
            }
            ?>
        </tbody>
    </table>
</body>
</html>