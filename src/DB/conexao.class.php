<?php

//classe que faz a conexao com o banco de dados.
abstract class Conexao {
    private static $dbHost = 'localhost';
    private static $dbNome = 'simulado_online'; //colocar o nome do banco de dados
    private static $dbUsuario = 'root';
    private static $dbSenha = '';
    private static $conexao = null;

    // public function __construct() {
    //     die('A função Init não é permitido!');
    // }

    //função de conexão com o banco de dados;
    protected static function connection() 
    {
        if (self::$conexao == null) {

            try {
                self::$conexao = new PDO("mysql:host=".self::$dbHost.";".
                    "dbname=".self::$dbNome, 
                    self::$dbUsuario, self::$dbSenha
                );
            } 
            catch(PDOException $exception) {
                echo("Erro com o banco de dados: ".$exception->getMessage());
            }
            catch(Exception $exception) {
                die("Erro generico: ".$exception.getMessage());
            }

        }

        return self::$conexao;
    }

    //encerrar a conexão com banco.
    protected static function  closeConnection()
    {
        self::$conexao = null;
    }

}

?>