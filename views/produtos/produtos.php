<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <h1> Criar Produtos </h1>
    <form action="../../index.php" method="post">
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
        <input type="text" name="nomeProduto" id="" placeholder="nome produto" required> <br><br>
        <input type="text" name="descProduto" id="" placeholder="descrição produto"> <br><br>
        <input type="number" name="precoProduto" id="" placeholder="valor produto" required><br><br>
        <input type="hidden" name="acao" value="criar">
        <input type="submit" value="CRIAR PRODUTO">
    </form>

    <h1> Deletar produtos </h1>
    <form action="../../index.php" method="post">
        <select name="produto" id="">
            <option value="nulo"> Selecione um produto </option>
            <?php
    
            require_once(__DIR__ . "/../../model/funcoes.php");
    
            $produto = readProdutos();
            foreach ($produto as $prod) {
                echo "<option value='{$prod['TB_PRODUTO_ID']}'> {$prod['TB_PRODUTO_NOME']} </option>";
            }
            ?>
        </select><br><br>
        <input type="hidden" name="acao" value="deleteProduto">
        <input type="submit" value="DELETAR PRODUTO">
    </form>


    <h1> Editar produtos </h1>
    <form action="produtos.php" method="post">
        <select name="produto" id="">
            <option value="nulo"> Selecione um produto </option>
            <?php
    
            require_once(__DIR__ . "/../../model/funcoes.php");
    
            $produto = readProdutos();
            foreach ($produto as $prod) {
                echo "<option value='{$prod['TB_PRODUTO_ID']}'> {$prod['TB_PRODUTO_NOME']} </option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="SELECIONAR"><br><br>
    </form>
    
    <?php

    if (isset($_POST['produto'])) {
        require_once(__DIR__ . "/../../model/funcoes.php");
        $conexao = conectarBanco();
        $sql = "SELECT * FROM tb_produto WHERE TB_PRODUTO_ID = ?";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $_POST['produto']);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $produto = $result->fetch_assoc();
            echo ("<form action='../../index.php' method='post'>
                <input type='text' name='nomeProduto' id='' placeholder='nome produto' value='{$produto["TB_PRODUTO_NOME"]}' required> <br><br>
                <input type='text' name='descProduto' id='' placeholder='descrição produto' value='{$produto["TB_PRODUTO_DESC"]}'> <br><br>
                <input type='number' name='precoProduto' id='' placeholder='valor produto' value='{$produto["TB_PRODUTO_PRECO_UNIT"]}' required><br><br>
                <input type='hidden' name='acao' value='editProduto'>
                <input type='submit' value='EDITAR PRODUTO'>
            </form>");
        } else {
            echo "<p>Produto não encontrado.</p>";
        }

        $stmt->close();
        $conexao->close();
    }
?>



    <h1> Criar categorias </h1>
    <form action="../../index.php" method="post">
        <input type="text" name="nomeCategoria" id="" placeholder="nome categoria" required>
        <input type="hidden" name="acao" value="criarCategoria">
        <input type="submit" value="CRIAR CATEGORIA">
    </form>

    <h1> Deletar categorias </h1>
    <form action="../../index.php" method="post">
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
        <input type="hidden" name="acao" value="deleteCategoria">
        <input type="submit" value="DELETAR CATEGORIA">
    </form>

    <h1> Editar categorias </h1>
    
    <form action="produtos.php" method="post">
        <select name="produto" id="">
            <option value="nulo"> Selecione um produto </option>
            <?php
    
            require_once(__DIR__ . "/../../model/funcoes.php");
    
            $produto = readProdutos();
            foreach ($produto as $prod) {
                echo "<option value='{$prod['TB_PRODUTO_ID']}'> {$prod['TB_PRODUTO_NOME']} </option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="SELECIONAR"><br><br>
    </form>
    
    <?php

    if (isset($_POST['produto'])) {
        require_once(__DIR__ . "/../../model/funcoes.php");
        $conexao = conectarBanco();
        $sql = "SELECT * FROM tb_produto WHERE TB_PRODUTO_ID = ?";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $_POST['produto']);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $produto = $result->fetch_assoc();
            echo ("<form action='../../index.php' method='post'>
                <input type='text' name='nomeProduto' id='' placeholder='nome produto' value='{$produto["TB_PRODUTO_NOME"]}' required> <br><br>
                <input type='text' name='descProduto' id='' placeholder='descrição produto' value='{$produto["TB_PRODUTO_DESC"]}'> <br><br>
                <input type='number' name='precoProduto' id='' placeholder='valor produto' value='{$produto["TB_PRODUTO_PRECO_UNIT"]}' required><br><br>
                <input type='hidden' name='acao' value='editProduto'>
                <input type='submit' value='EDITAR PRODUTO'>
            </form>");
        } else {
            echo "<p>Produto não encontrado.</p>";
        }

        $stmt->close();
        $conexao->close();
    }
?>
</body>
</html>