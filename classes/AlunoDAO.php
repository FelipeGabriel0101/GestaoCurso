<?php

require_once 'classes/Aluno.php';
require_once 'classes/Conexao.php';

class AlunoDAO
{
    public function create(Aluno $aluno)
    {
        $pdo = Conexao::conectar();

        try {
            $sql = "INSERT INTO alunos (nome, email, telefone) VALUES (:NOME, :EMAIL, :TELEFONE)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":NOME", $aluno->getNome());
            $stmt->bindValue(":EMAIL", $aluno->getEmail());
            $stmt->bindValue(":TELEFONE", $aluno->getTelefone());
            $stmt->execute();

            echo 'Aluno cadastrado com sucesso!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function read()
    {
        $pdo = Conexao::conectar();

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
        $pdo = Conexao::conectar();

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
        $pdo = Conexao::conectar();

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