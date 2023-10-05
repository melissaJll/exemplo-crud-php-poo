<?php
namespace ExemploCrudPoo;

use Exception; //acrescentar
use PDO;

class Produto{

    private int $id;
    private string $nome;
    private float $preco;
    private string $descricao;
    private int $quantidade;
    private int $fabricante_Id;
    private PDO $conexao;

    public function __construct() {
        $this->conexao = Banco::conecta();
    }




    function lerProdutos():array {
        $sql = "SELECT 
                    produtos.id,
                    produtos.nome AS produto,
                    produtos.preco,
                    produtos.quantidade,
                    fabricantes.nome AS fabricante,
                    (produtos.preco * produtos.quantidade) AS total
                FROM produtos INNER JOIN fabricantes
                ON produtos.fabricante_id = fabricantes.id
                ORDER BY produto";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao carregar produtos: ".$erro->getMessage());
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


    
    public function getPreco(): float
    {
        return $this->preco;
    }
    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }


    
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }


    
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;

    }

    
    public function getFabricanteId(): int
    {
        return $this->fabricante_Id;
    }

    public function setFabricanteId(int $fabricante_Id): void
    {
        $this->fabricante_Id = $fabricante_Id;
    }
}