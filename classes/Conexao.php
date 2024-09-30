<?php

class Conexao
{
    private static $dsn = 'mysql:host=localhost;dbname=gestao';
    private static $username = 'root';
    private static $password = '';

    public static $pdo = null;

    public function __construct()
    {

    }

    public static function conectar()
    {
        if (empty(self::$pdo)){
            try{
                self::$pdo = new PDO(self::$dsn, self::$username, self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){
                echo 'Erro: ' . $e->getMessage();
            }
        }

        return self::$pdo;
    }
}