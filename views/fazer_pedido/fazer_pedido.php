<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer pedido</title>
    <link rel="stylesheet" href="fazer_pedido.css">
</head>
<body>
    <script>
        let produtos = [];
        function adicionarProduto(){
            let produto = document.querySelector("select[name='produto']").value;
            let quantProduto = document.querySelector("input[name='quantProduto']").value;

            if (produto == "nulo" || quantProduto <= 0){
                alert("Selecione um produto e uma quantidade válida");
                return;
            }

            let prod = {
                produto: produto,
                quantidade: quantProduto
            };

            produtos.push(prod);
            console.log(produtos);
            alert("Produto adicionado ao pedido");

            return produtos
        }
    </script>
    <form action="fazer_pedido.php" method="post">
        <h1>Fazer pedido</h1>
        <select name="produto" id="">
            <option value="nulo"> Selecione um produto </option>
            <?php
    
            require_once(__DIR__ . "/../../model/funcoes.php");
    
            $produto = readProdutos();
            foreach ($produto as $prod) {
                echo "<option value='{$prod['TB_PRODUTO_ID']}'> {$prod['TB_PRODUTO_NOME']} </option>";
            }
            ?>
        </select>
        <input type="number" name="quantProduto" placeholder="Quantidade">
        <button onclick="adicionarProduto()">Adicionar</button>
    </form>
</body>
</html>