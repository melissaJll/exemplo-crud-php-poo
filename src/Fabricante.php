<?php
namespace ExemploCrudPoo;

use Exception; //acrescentar
use PDO;

final class Fabricante{

    private int $id;
    private string $nome;
    //Essa atributo recebera os recursos PDO straves da classe Banco ()dependencia do projeto
    private PDO $conexao;

    public function __construct() {
        // Como é construtor, no momento e que um objeto Fabricante for criado, automaticamente será feita a chamada do método "conecta" existente na classe Banco
        $this->conexao = Banco::conecta();
    }
//Vizualizar
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

    
// Inserir
    public function inserirFabricante():void {
        $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR); //nomeFabricante não é mais um parametro agora é $nome atributo
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao inserir: ".$erro->getMessage());
        }

    }


//Atualizar 1
    public function lerUmFabricante():array {
        $sql = "SELECT * FROM fabricantes WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT); //Dentro da propria classe $this->id | fora da classe $this->getId
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao carregar: ".$erro->getMessage());
        }

        return $resultado;
    } 
    //pt2

    public function atualizarFabricante():void {
        $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
        
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao atualizar: ".$erro->getMessage());
        }
    } 





//Excluir
    public function excluirFabricante():void {
        $sql = "DELETE FROM fabricantes WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao excluir: ".$erro->getMessage());
        }
    } 











    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    }


    public function getNome(): string
    {
        return $this->nome;
    }
    //Já foi sanitizado então a partir de agora sempre estará sanitizado então em atualizar pt2 não precisa sanitizar nome 
    public function setNome(string $nome): void //inserir.php Post['nome'] -fornece>  este parametro string $nome ...
    {
        $this->nome = filter_var($nome,FILTER_SANITIZE_SPECIAL_CHARS); //... atributo nome recebe $nome;
    }
}