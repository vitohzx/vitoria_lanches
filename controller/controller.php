<?php

require("model/funcoes.php");

function home(){
    include("./views/home/inicio.php");
}

function criarProd(){
    criarProdutos($_POST["nomeProduto"], $_POST["descProduto"], $_POST["precoProduto"], $_POST["categoria"]);
    header("Location: ./views/produtos/produtos.php");
}

function deleteProd(){
    deleteProduto($_POST["produto"]);
    header("Location: ./views/produtos/produtos.php");
}

function editProd(){
    editarProduto($_POST["nomeProduto"], $_POST["descProduto"], $_POST["precoProduto"], $_POST["produto"]);
    header("Location: ./views/produtos/produtos.php");
}

function criarCat(){
    criarCategoria($_POST["nomeCategoria"]);
    header("Location: ./views/produtos/produtos.php");
}

function deleteCat(){
    deleteCategoria($_POST["categoria"]);
    header("Location: ./views/produtos/produtos.php");
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