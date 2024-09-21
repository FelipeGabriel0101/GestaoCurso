<?php

class Curso 
{
    private $id, $nome, $duracao, $descricao;

    public function __construct($id = null, $nome, $duracao, $descricao)
    {
        if (!empty($id)) {
            $this->setId($id);
        }

        $this->setNome($nome);
        $this->setDuracao($duracao);
        $this->setDescricao($descricao);
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

    public function setDuracao($duracao)
    {
        if (empty($duracao)){
            throw new Exception("Duração é obrigatória.");
        }

        $this->$duracao = $duracao;
        
    }

    public function setDescricao($descricao)
    {
        if (empty($descricao)){
            throw new Exception("Descrição é obrigatória.");
        }

        $this->descricao = $descricao;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDuracao()
    {
        return $this->duracao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
}