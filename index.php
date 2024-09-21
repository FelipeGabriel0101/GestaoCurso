<?php

require_once 'classes/CursoDAO.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Duração</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- linha de aluno -->
                    <?php
                    $curso = new CursoDAO();

                    $cursos = $curso->read(); // Vetor Associativo

                    if (!empty($cursos)) {

                        foreach ($cursos as $curso) {
                        ?>
                        <tr><!-- linha de tabela -->
                            <td><?php echo $curso['id'];    ?></td>
                            <td><?php echo $curso['nome'];  ?></td>
                            <td><?php echo $curso['duracao']; ?></td>
                            <td><?php echo $curso['descricao']; ?></td>
                            <td>
                                <button class="edit-btn" onclick="location.href='editar.php?id=<?php echo $aluno['id']; ?>'">Editar</button>
                                <button class="delete-btn" onclick="location.href='processa.php?id=<?php echo $aluno['id']; ?>'">Excluir</button>
                            </td>
                        </tr>
                        <?php
                        } // endloop
                    } else {
                        echo "Nenhum registro encontrado.";
                    }
                    ?>
                </tbody>
            </table>
</body>
</html>