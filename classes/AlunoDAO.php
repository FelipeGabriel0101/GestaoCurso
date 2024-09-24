<?php

require_once 'classes/Aluno.php';

class AlunoDAO
{
    public function create(Aluno $aluno)
    {
        require_once './config.php';

        try {
            $sql = "INSERT INTO alunos (nome, email, telefone) VALUES (:NOME, :EMAIL, :TELEFONE)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":NOME", $curso->getNome());
            $stmt->bindValue(":EMAIL", $curso->getEmail());
            $stmt->bindValue(":TELEFONE", $curso->getTelefone());
            $stmt->execute();

            echo 'Aluno cadastrado com sucesso!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function read()
    {
        require_once './config.php';

        try {
            $sql = "SELECT * FROM alunos";

            $stmt = $pdo->query($sql);

            return $stmt;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(Aluno $aluno)
    {
        require_once './config.php';

        try {
            $sql = "UPDATE alunos SET nome = :NOME, email = :EMAIL, telefone = :TELEFONE WHERE id = :ID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":ID", $aluno->getId());
            $stmt->bindValue(":NOME", $aluno->getNome());
            $stmt->bindValue(":EMAIL", $aluno->getEmail());
            $stmt->bindValue(":TELEFONE", $aluno->getTelefone());
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
            $query = 'DELETE FROM alunos WHERE id = :ID';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(":ID", $id);
            $stmt->execute();

            echo 'Aluno excluído com sucesso!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function search($id)
    {
        require_once './config.php';

        try {
            $sql = "SELECT * FROM alunos WHERE id = :ID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":ID", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}