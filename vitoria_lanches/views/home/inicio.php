<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <?php

    require_once(__DIR__ . "/../../model/funcoes.php");
    $tipo = isset($_GET["user"];

    if($tipo){
        $tipo = "visitante"
    } else {
        $tipo = "visitante"
    }


    if ($tipo["TB_USUARIOS_TIPO"] == "administrador") {
        echo "
            <div>
                <a href='../produtos/produtos.php?user={$_GET['user']}'>Gerenciar Produtos</a><br><br>
                <a href='../usuarios/usuarios.php?user={$_GET['user']}'>Gerenciar Usuarios</a><br><br>
                <a href='../pedidos/pedidos.php?user={$_GET['user']}'>Gerenciar Pedidos</a><br><br>
                <a href='#'>Gerar Relatorios</a><br><br>
            </div>
        ";
    }
    ?>
    <a href="#">Produtos</a>
</body>
</html>