<?php

require_once "classes/CursoDAO.php";
require_once 'classes/Conexao.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            <button class="btn btn-warning" onclick="location.href='cadastrar.php'">Criar Administrador</button>
            <button class="btn btn-danger" onclick="location.href='logout.php'">Logout</button>
        </nav>
    </header>
    
    <h2>Cursos</h2>
    <hr>
        <button class="btn btn-success" onclick="location.href='Criar-Curso.php'">Criar Novo Curso</button>
    <table class="table-layout">
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
                        <button class="btn btn-warning" onclick="location.href='Editar-Curso.php?id=<?php echo $curso['id']; ?>'">Editar</button>
                        <button class="btn btn-danger" onclick="location.href='Excluir-Curso.php?id=<?php echo $curso['id']; ?>'">Excluir</button>
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