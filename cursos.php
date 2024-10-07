<?php

require_once "classes/CursoDAO.php";
require_once 'classes/Conexao.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Cursos</title>
</head>
<body>
    <header class="header">
        <p class="logo">Gestão de Cursos</p>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="cursos.php">Cursos</a>
            <a href="alunos.php">Alunos</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    
    <h2>Cursos</h2>
    <hr>
    <div class="create-btn" onclick="location.href='Criar-Curso.php'">
        <p>Criar novo curso</p>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Duração (Horas)</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $curso = new CursoDAO();

            $cursos = $curso->read();

            if (!empty($cursos)) {

                foreach ($cursos as $curso) {
                ?>
                <tr>
                    <td><?php echo $curso['id']; ?></td>
                    <td><?php echo $curso['nome']; ?></td>
                    <td><?php echo $curso['duracao'] . " Horas"; ?></td>
                    <td><?php echo $curso['descricao']; ?></td>
                    <td>
                        <button class="edit-btn" onclick="location.href='Editar-Curso.php?id=<?php echo $curso['id']; ?>'">Editar</button>
                        <button class="delete-btn" onclick="location.href='Excluir-Curso.php?id=<?php echo $curso['id']; ?>'">Excluir </button>
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