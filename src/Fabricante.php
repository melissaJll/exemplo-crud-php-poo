<?php
namespace ExemploCrudPoo;

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