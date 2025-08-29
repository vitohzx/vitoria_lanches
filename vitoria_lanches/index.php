<?php

require("controller/controller.php");

$acao = isset($_POST["acao"]) ? $_POST["acao"] : "login";

switch($acao){
    case "login": {
        login();
        break;
    }
    case "logar": {
        logarUsuario();
        break;
    }
    case "cadastrar": {
        cadastro();
        break;
    }
    case "inicio": {
        home();
        break;
    }
    case "buscar": {
        exibirBusca();
        break;
    }
    case "criar": {
        criarProd();
        break;
    }

    case "criarCategoria": {
        criarCat();
        break;
    }

    case "concluir": {
        concluirCadastroUser();
        break;
    }
}

?>