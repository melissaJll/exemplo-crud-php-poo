<?php
require_once "../src/funcoes-fabricantes.php";
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$fabricante = lerUmFabricante($conexao, $id);

if( isset($_POST['atualizar']) ){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    atualizarFabricante($conexao, $nome, $id);  
    header("location:visualizar.php?status=sucesso");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$fabricante['id']?>">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$fabricante['nome']?>" required type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="atualizar">
                Atualizar fabricante</button>
        </form>
        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </div>

</body>
</html>