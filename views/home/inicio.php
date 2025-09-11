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

            session_start();

            require_once(__DIR__. "/../../model/funcoes.php");
        
            $tipo = "visitante";
            $username = "visitante";

            if(isset($_POST["user"])) {
                $usuario = getUser($_POST["user"]);
                $tipo = $usuario["TB_USUARIOS_TIPO"];
                $username = $usuario["TB_USUARIOS_USERNAME"];
            }
            

                echo "<div class='aba'>
                        <div class='icon'> <img src='../../images/home.png' height='100%' width='100%'> </div>
                        <form action='inicio.php' method='post'> 
                            <input type='submit' value='Home' class='links'> 
                            <input type='hidden' name='user' value='{$username}'> 
                        </form>
                    </div>
                    <div class='aba'>
                        <div class='icon'> <img src='../../images/prod.png' height='100%' width='100%'> </div>
                        <form action='#' method='post'> 
                            <input type='submit' value='Produtos' class='links'> 
                            <input type='hidden' name='user' value='{$username}'> 
                        </form>
                    </div>";
            

            if ($tipo == "administrador") {
                echo "
                    <div class='aba'>
                        <div class='icon'> </div>
                        <form action='../produtos/produtos.php' method='post'> 
                            <input type='submit' value='Gerenciar Produtos' class='adm'> 
                            <input type='hidden' name='user' value='{$username}'> 
                        </form>
                    </div>
                    <div class='aba'>
                        <div class='icon'> </div>
                        <form action='../usuarios/usuarios.php' method='post'> 
                            <input type='submit' value='Gerenciar Usuarios' class='adm'> 
                            <input type='hidden' name='user' value='{$username}'> 
                        </form>
                    </div>
                    <div class='aba'>       
                        <div class='icon'> </div>
                        <form action='../pedidos/pedidos.php' method='post'> 
                            <input type='submit' value='Gerenciar Pedidos' class='adm'> 
                            <input type='hidden' name='user' value='{$username}'> 
                        </form>
                    </div>
                    <div class='aba'>
                        <div class='icon'> </div>
                        <form action='#' method='post'> 
                            <input type='submit' value='Gerar Relatorios' class='adm'> 
                            <input type='hidden' name='user' value='{$username}'> 
                        </form>
                    </div>
                ";
            }
            else if ($tipo == "cliente") {
                echo "
                    <div class='aba'>
                        <div class='icon'> </div>
                        <form action='../fazer_pedido/fazer_pedido.php' method='post'> 
                            <input type='submit' value='Fazer Pedido' class='links'> 
                            <input type='hidden' name='user' value='{$username}'> 
                        </form>
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