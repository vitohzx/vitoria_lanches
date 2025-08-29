<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <h1> Criar Produtos </h1>
    <form action="index.php" method="post">
        <select name="categoria" id="">
            <option value="nulo"> Selecione uma categoria </option>
            <?php
    
            require_once(__DIR__ . "/../../model/funcoes.php");
    
            $categoria = readCategorias();
            foreach ($categoria as $cat) {
                echo "<option value='{$cat['TB_TIPO_PRODUTO_ID']}'> {$cat['TB_TIPO_PRODUTO_DESC']} </option>";
            }
            ?>
        </select><br><br>
        <input type="text" name="nomeProduto" id="" placeholder="Digite o nome do produto" required> <br><br>
        <input type="number" name="precoProduto" id="" placeholder="Digite o valor do produto" required><br><br>
        <input type="hidden" name="acao" value="criar">
        <input type="submit" value="CRIAR PRODUTO">
    </form>
</body>
</html>