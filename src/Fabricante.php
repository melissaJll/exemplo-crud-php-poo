<?php
namespace ExemploCrudPoo;

use Exception; //acrescentar
use PDO;

final class fabricante{

    private int $id;
    private string $nome;
    //Essa atributo recebera os recursos PDO straves da classe Banco ()dependencia do projeto
    private PDO $conexao;

    public function __construct() {
        // Como é construtor, no momento e que um objeto Fabricante for criado, automaticamente será feita a chamada do método "conecta" existente na classe Banco
        $this->conexao = Banco::conecta();
    }

    public function lerFabricantes():array { //Tirar a pdo conexao como parametro
        $sql = "SELECT * FROM fabricantes ORDER BY nome";
        
        try {
            $consulta = $this->conexao->prepare($sql); //acrescentar this para usar o atributo conexao
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }    
    
        return $resultado;
    } 





    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;

    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
}