<?php
require_once "conecta.php";









function atualizarProduto(PDO $conexao, int $id, string $nome, float $preco, int $quantidade, string $descricao, int $fabricanteId):void {

    $sql = "UPDATE produtos SET
        nome = :nome,
        preco = :preco,
        quantidade = :quantidade,
        descricao = :descricao,
        fabricante_id = :fabricanteId WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":preco", $preco, PDO::PARAM_STR);
        $consulta->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);
        $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);
        $consulta->bindValue(":fabricanteId", $fabricanteId, PDO::PARAM_INT);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao atualizar: ".$erro->getMessage());
    }   
}


function excluirProduto(PDO $conexao, int $id):void {
    $sql = "DELETE FROM produtos WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao excluir: ".$erro->getMessage());
    }
}









