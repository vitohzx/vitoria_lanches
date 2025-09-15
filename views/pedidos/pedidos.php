<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuarios</title>
    <link rel="stylesheet" href="../../styles/pedidos.css">
</head>
<body>

    <?php
    require_once(__DIR__ . "/../../model/funcoes.php");
    $pedidos = getPedidos();

    if(count($pedidos) == 0){
        echo "<script>alert('Nenhum pedido encontrado');</script>";
    }

    ?>
    </form>

</body>
</html>