<?php

require("model/funcoes.php");

function home(){
    include("./views/home/inicio.php");
}

function exibirBusca(){
    include("./views/produtos/produtos.php");
    readProdutos($_POST["categoria"]);
}

function criarProd(){
    criarProdutos($_POST["nomeProduto"], $_POST["categoria"], $_POST["precoProduto"]);
    include("./views/home/inicio.php");
}

function criarCat(){
    criarCategoria($_POST["nomeCategoria"]);
    include("./views/home/inicio.php");
}

function login(){
    header("Location: ./views/login/login.php");
}

function logarUsuario(){
    $user = loginUser($_POST["user"], $_POST["senha"]);
    if ($user){
        header("Location: ./views/home/inicio.php");
    } else {
        header("Location: ./views/login/login.php");
        echo "<script>alert('Usuario ou senha incorretos');</script>";
    }
}

function cadastro(){
    cadastroUser($_POST["user"], $_POST["senha"], $_POST["senhaC"]);
}

function concluirCadastroUser(){
    concluirCadastro($_POST["nome"], $_POST["tel"], $_POST["endereco"], $_POST["numEndereco"], $_GET["user"]);
    header("Location: ./views/home/inicio.php");
}

?>