<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../../styles/produtos.css">
</head>

<body>
    <script>
        $(document).ready(function() {
            $('.selectProd').select2();
        });
    </script>

    <form action="../../index.php" method="post" class="formStyle">
        <span class="subtitulo"> CADASTRAR PRODUTOS </span>
        <div class="linha">
            <img src="../../images/user (3).png" alt="" style="width: 31px; height: 31px; margin-left: 5%">
            <input type="text" name="nomeProduto" id="" placeholder="NOME PRODUTO" required class="textInput">
        </div>
        <div class="linha">
            <img src="../../images/user (3).png" alt="" style="width: 31px; height: 31px; margin-left: 5%">
            <input type="text" name="descProduto" id="" placeholder="PREÇO PRODUTO" required class="textInput">
        </div>
        <div class="linha">
            <img src="../../images/user (3).png" alt="" style="width: 31px; height: 31px; margin-left: 5%">
            <input type="text" name="precoProduto" id="" placeholder="DESCRIÇÃO PRODUTO" class="textInput">
        </div>
        <div class="linha2">
            <select name="categoria" id="selectProd" class="selectProd">
                <option value="nulo"> Selecione uma categoria </option>
                <?php

                require_once(__DIR__ . "/../../model/funcoes.php");

                $categoria = readCategorias();
                foreach ($categoria as $cat) {
                    echo "<option value='{$cat['TB_TIPO_PRODUTO_ID']}'> {$cat['TB_TIPO_PRODUTO_DESC']} </option>";
                }
                ?>
            </select>

            <input type="submit" value="CADASTRAR PRODUTO" class="cadProd">
            <input type="hidden" name="user" value="<?php echo $_POST["user"] ?>">
            <input type="hidden" name="acao" value="criar">
        </div>
    </form>

    <form action="../../index.php" method="post">
        <input type="text">
    </form>



    <form action="../../index.php" method="post" class="formStyle">
        <span class="subtitulo"> CADASTRAR CATEGORIAS </span>
        <div class="linha">
            <img src="../../images/user (3).png" alt="" style="width: 31px; height: 31px; margin-left: 5%">
            <input type="text" name="nomeCategoria" id="" placeholder="NOME CATEGORIA" required class="textInput">
        </div>
        <input type="submit" value="CRIAR CATEGORIA" class="cadProd" style="margin-left: 0">
        <input type="hidden" name="acao" value="criarCategoria">
        <input type="hidden" name="user" value="<?php echo $_POST["user"] ?>">
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
        <input type="hidden" name="user" value="<?php echo $_POST["user"] ?>">
    </form>

    <h1> Editar categorias </h1>

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
        <input type="text" name="nomeCategoria" id="" placeholder="nome categoria" required>
        <input type="hidden" name="acao" value="editCategoria">
        <input type="submit" value="EDITAR CATEGORIA"><br><br>
        <input type="hidden" name="user" value="<?php echo $_POST["user"] ?>">
    </form>

</body>

</html>