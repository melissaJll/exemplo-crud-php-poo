<?php
namespace ExemploCrudPoo;

use PDO, Exception;

abstract class Banco{

    private static string $servidor = "localhost";
    private static string $usuario = "root";
    private static string $senha = "";
    private static string $banco = "Vendas_poo";

    private static PDO $conexao;
    // Classes internas precisam de do Use ou '\PDO' no momento da criação

    //Método de conexão ao banco (será usado pelas outras classes)
    public static function conecta() : PDO {

        try {
            self::$conexao = new PDO(
                "mysql:host=".self::$servidor.
                ";dbname=".self::$banco.
                ";charset=utf8",
                self::$usuario,self::$senha
            ); 
            
            self::$conexao->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );
            echo "Certo";
        } catch(Exception $erro){ //Exception é uma função do PHP como PDO
            die("Deu ruim: ".$erro->getMessage());
        }
                
        return self::$conexao;
    }

    //fim
}

//Banco::conecta(); Teste -> http://localhost/exemplo-crud-php-poo/src/Banco.php