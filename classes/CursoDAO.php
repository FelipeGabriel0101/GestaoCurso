<?php

require_once 'classes/Curso.php';

class CursoDAO
{
    public function create(Curso $curso)
    {
        require_once './config.php';

        try {
            $sql = "INSERT INTO cursos (nome, duracao, descricao) VALUES (:NOME, :DURACAO, :DESCRICAO)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":NOME", $curso->getNome());
            $stmt->bindValue(":DURACAO", $curso->getDuracao());
            $stmt->bindValue(":DESCRICAO", $curso->getDescricao());
            $stmt->execute();

            echo 'Curso cadastrado com sucesso!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function read()
    {
        require_once './config.php';

        try {
            $sql = "SELECT * FROM cursos";

            $stmt = $pdo->query($sql);

            return $stmt;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(Curso $curso)
    {
        require_once './config.php';

        try {
            $sql = "UPDATE cursos SET nome = :NOME, duracao = :DURACAO, descricao = :DESCRICAO WHERE id = :ID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":ID", $curso->getId());
            $stmt->bindValue(":NOME", $curso->getNome());
            $stmt->bindValue(":DURACAO", $curso->getDuracao());
            $stmt->bindValue(":DESCRICAO", $curso->getDescricao());
            $smt->execute();

            echo 'Dados alterados com sucesso!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function delete($id)
    {
        require_once './config.php';

        try {
            $query = 'DELETE FROM cursos WHERE id = :ID';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(":ID", $id);
            $stmt->execute();

            echo 'Curso excluído com sucesso!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function search($id)
    {
        require_once './config.php';

        try {
            $sql = "SELECT * FROM cursos WHERE id = :ID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":ID", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}