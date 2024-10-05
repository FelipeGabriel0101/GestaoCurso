<?php

require_once "classes/AlunoDAO.php";

$id = 5;

$procura = AlunoDAO::search($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Alunos</title>
</head>
<body>
    <header class="header">
        <a href="" class="logo">Logo</a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="cursos.php">Cursos</a>
            <a href="alunos.php">Alunos</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <p><a href="Criar-Aluno.php">Criar novo Aluno</a></p>
    <table border=1>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>id_curso</th>
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
                    <td><?php echo $aluno['id_curso'] ?></td>
                    <td>
                    <button onclick="location.href='Editar-Aluno.php?id=<?php echo $aluno['id']; ?>'">Editar</button>
                        <button onclick="location.href='Excluir-Aluno.php?id=<?php echo $aluno['id']; ?>'">Excluir </button>
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