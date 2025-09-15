<?php

session_start();

require("model/funcoes.php");

function home(){
    header("Location: ./views/home/inicio.php");
}

function criarProd(){
    $nomeProduto = $_POST["nomeProduto"];
    $descProduto = $_POST["descProduto"];
    $precoProduto = $_POST["precoProduto"];
    $categoriaProduto = $_POST["categoria"];

    criarProdutos($nomeProduto, $descProduto, $precoProduto, $categoriaProduto);
    
    echo "<form action='./views/home/inicio.php?pagina=gerenciar_produtos' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$_POST["user"]}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";
}

function deleteProd(){
    $produtoID = $_POST["produto"];

    deleteProduto($produtoID);
    
    echo "<form action='./views/home/inicio.php?pagina=gerenciar_produtos' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$_POST["user"]}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";
}

function editProd(){
    editarProduto($_POST["nomeProduto"], $_POST["descProduto"], $_POST["precoProduto"], $_POST["produto"]);
    
    echo "<form action='./views/home/inicio.php?pagina=gerenciar_produtos' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$_POST["user"]}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";
}

function criarCat(){
    $nomeCategoria = $_POST["nomeCategoria"];
    criarCategoria($nomeCategoria);
    
    echo "<form action='./views/home/inicio.php?pagina=gerenciar_produtos' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$_POST["user"]}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";
}

function deleteCat(){
    $categoriaID = $_POST["categoria"];
    deleteCategoria($categoriaID);

    echo "<form action='./views/home/inicio.php?pagina=gerenciar_produtos' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$_POST["user"]}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";
}

function editCat(){
    $nomeCategoria = $_POST["nomeCategoria"];
    $categoriaID = $_POST["categoria"];
    editarCategoria($nomeCategoria, $categoriaID);
    echo "<form action='./views/home/inicio.php?pagina=gerenciar_produtos' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$_POST["user"]}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";
}


function logarUsuario(){
    $user = loginUser($_POST["user"], $_POST["senha"]);
    $username = $_POST["user"];

    if ($user){
        echo "<form action='./views/home/inicio.php' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$username}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";
        
    } else {
        echo "<script>alert('Usuario ou senhas incorretos'); window.location.href='./views/login/login.php'</script>";;
    }
}

function cadastro(){
    cadastroUser($_POST["user"], $_POST["senha"], $_POST["senhaC"]);
}

function concluirCadastroUser(){
    concluirCadastro($_POST["nome"], $_POST["tel"], $_POST["endereco"], $_POST["numEndereco"], $_GET["user"]);
    
    echo "<form action='./views/home/inicio.php' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$_GET["user"]}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";
}

function deletarUser(){
    $userID = $_POST["usuarios"];
    deleteUser($userID);

    echo "<form action='./views/home/inicio.php?pagina=usuarios' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$_POST["user"]}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";
}

//pedido

function fazerPedido(){
    $carrinho = json_decode($_POST["carrinho"], true);
    $user = $_POST["user"];

    pedido($carrinho, $user);
    echo "<form action='./views/home/inicio.php?pagina=fazer_pedido' method='post' id='formUser'>
            <input type='hidden' name='user' value='{$user}'>
        </form>
        <script> document.getElementById('formUser').submit() </script>";

}

?>