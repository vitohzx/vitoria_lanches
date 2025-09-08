<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <div class="container">
        <div class="menu">
            <?php

            echo "<div class='aba'>
                    <div class='icon'> <img src='../../images/home.png' height='100%' width='100%'> </div> <a href='inicio.php?user={$_GET['user']}'>Home</a>
                </div>
                <div class='aba'>
                    <div class='icon'> <img src='../../images/prod.png' height='100%' width='100%'> </div> <a href='#'>Produtos</a>
                </div>";


            require_once(__DIR__. "/../../model/funcoes.php");
        
            $user = isset($_GET["user"]) ? $user = getUser($_GET["user"]) : null;
            $tipo = "visitante";
            if($user) $tipo = $user["TB_USUARIOS_TIPO"];
            if ($tipo == "administrador") {
                echo "
                    <div class='aba'>
                        <div class='icon'> </div> <a href='../produtos/produtos.php?user={$_GET['user']}' class='adm'>Gerenciar Produtos</a>
                    </div>
                    <div class='aba'>
                        <div class='icon'> </div> <a href='../usuarios/usuarios.php?user={$_GET['user']}' class='adm'>Gerenciar Usuarios</a>
                    </div>
                    <div class='aba'>       
                        <div class='icon'> </div> <a href='../pedidos/pedidos.php?user={$_GET['user']}' class='adm'>Gerenciar Pedidos</a>
                    </div>
                    <div class='aba'>
                        <div class='icon'> </div> <a href='#' class='adm'>Gerar Relatorios</a>
                    </div>
                ";
            }
            else if ($tipo == "cliente"){
                echo "<div>
                    <a href='../produtos/produtos.php?user={$_GET['user']}'>Fazer Pedido</a><br><br>
                </div>";
            }
            
            ?>
        </div>
        <div class="main">
            <div class="header">
                <div class="titulo">
                    <span class="text"> vitoria lanches </span>
                </div>
                <div class="conta">
                    <a href="../login/login.php"> <img src="../../images/user.png" alt="" height="100%" width="100%"> </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>