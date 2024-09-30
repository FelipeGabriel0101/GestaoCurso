<?php

require_once "classes/CursoDAO.php";
require_once 'classes/Conexao.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
</head>
<body>
    <h2>Cursos</h2>
    <p><a href="Criar-Curso.php">Criar novo curso</a></p>
    <table border=1>
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
                    <td><?php echo $curso['duracao']; ?></td>
                    <td><?php echo $curso['descricao']; ?></td>
                    <td>
                        <button onclick="location.href='Editar-Curso.php?id=<?php echo $curso['id']; ?>'">Editar</button>
                        <button onclick="location.href='Excluir-Curso.php?id=<?php echo $curso['id']; ?>'">Excluir </button>
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