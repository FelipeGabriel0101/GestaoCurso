<?php

class Aluno
{
    private $id, $nome, $email, $telefone, $id_curso;

    public function __construct($id = null, $nome, $email, $telefone, $id_curso = null)
    {
        if (!empty($id)){
            $this->setId($id); 
        }

        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTelefone($telefone);

        if (!empty($id_curso)){
            $this->setId_Curso($id_curso);
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        if (empty($nome)){
            throw new Exception("Nome é obrigatório.");
        }
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        if (empty($email)){
            throw new Exception("Email é obrigatório.");
        }
        $this->email = $email;
    }

    public function setTelefone($telefone)
    {
        if (empty($telefone)){
            throw new Exception("Telefone é obrigatório.");
        }
        $this->telefone = $telefone;
    }

    public function setId_curso($id_curso)
    {
        $this->id_curso = $id_curso;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getId_curso()
    {
        return $this->id_curso;
    }
}