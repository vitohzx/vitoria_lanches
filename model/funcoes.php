<?php

function conectarBanco() {
    $host = "127.0.0.1";
    $user = "root";
    $password = "root";
    $database = "vitoria_lanches";

    // Criação da conexão
    $conexao = new mysqli($host, $user, $password, $database);

    // Verifica se houve erro na conexão
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Define o charset para evitar problemas com caracteres especiais
    $conexao->set_charset("utf8mb4");

    return $conexao;
}


function loginUser($name, $senha){
    $sql = "SELECT * FROM tb_usuarios WHERE TB_USUARIOS_USERNAME = ? AND TB_USUARIOS_PASSWORD = ?";
    $conexao = conectarBanco();
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $name, $senha);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $stmt->close();
        $conexao->close();
        return true;
    } 
    else {
        $stmt->close();
        $conexao->close();
        return false;
    }
}

function cadastroUser($user, $senha, $confirm){
    if ($senha != $confirm) {
        echo "<script>alert('A confirmação da senha está incorreta'); window.location.href='./views/cadastrar/cadastrar.php'</script>";
        return;
    }
    try {
        $sql = "INSERT INTO tb_usuarios (TB_USUARIOS_USERNAME, TB_USUARIOS_PASSWORD, TB_USUARIOS_TIPO) VALUES (?, ?, 'cliente')";
        $conexao = conectarBanco();
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $user, $senha);
        $stmt->execute();
    } 
    catch(Exception $e) {
        echo "<script>alert('Já existe um usuario com esse username'); window.location.href='./views/cadastrar/cadastrar.php'</script>";
    }


    $stmt->close();
    $conexao->close();

    header("Location: views/concluir_cadastro/cadastro.php?user=$user");
}

function concluirCadastro($nome, $tel, $endereco, $numEndereco, $user){
    $conexao = conectarBanco();
    $select = "SELECT TB_USUARIOS_ID FROM tb_usuarios WHERE TB_USUARIOS_USERNAME = ?";
    $stmtSelect = $conexao->prepare($select);
    $stmtSelect->bind_param("s", $user);
    $stmtSelect->execute();
    $result = $stmtSelect->get_result();
    $result = $result->fetch_assoc();
    $id = $result["TB_USUARIOS_ID"];

    $sql = "INSERT INTO tb_cliente (TB_CLIENTE_NOME, TB_CLIENTE_TEL, TB_CLIENTE_ENDERECO, TB_CLIENTE_ENDERECO_NUM, TB_CLIENTE_FK) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssi", $nome, $tel, $endereco, $numEndereco, $id);
    $stmt->execute();
}




// produtos

function readProdutos(){
    $sql = "SELECT * FROM tb_produto";       
    $conexao = conectarBanco();   
    $result = $conexao->query($sql);
    $produtos = [];

    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
    $conexao->close();

    return $produtos;
}

function deleteProduto($id){
    $sql = "DELETE FROM tb_produto WHERE TB_PRODUTO_ID = ?";
    $conexao = conectarBanco();
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conexao->close();
}


function criarProdutos($nome, $desc, $preco, $id){
    if ($id == "nulo") {
        return;
    }
    $sql = "INSERT INTO tb_produto (TB_PRODUTO_NOME, TB_PRODUTO_DESC, TB_PRODUTO_PRECO_UNIT, TB_TIPO_PRODUTO_ID) VALUES (?, ?, ?, ?)";
    $conexao = conectarBanco();
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssdi", $nome, $desc, $preco, $id);
    $stmt->execute();
    $stmt->close();
    $conexao->close();
}

function editarProduto($nome, $desc, $preco, $id){
    $sql = "UPDATE tb_produto SET TB_PRODUTO_NOME = ?, TB_PRODUTO_DESC = ?, TB_PRODUTO_PRECO_UNIT = ? WHERE TB_PRODUTO_ID = ?";
    $conexao = conectarBanco();
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssdi", $nome, $desc, $preco, $id);
    $stmt->execute();
    $stmt->close();
    $conexao->close();
}

// categorias

function readCategorias(){
    $sql = "SELECT * FROM tb_tipo_produto";       
    $conexao = conectarBanco();   
    $result = $conexao->query($sql);
    $categorias = [];

    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    $conexao->close();

    return $categorias;
}

function criarCategoria($nome){
    $sql = "INSERT INTO tb_tipo_produto (TB_TIPO_PRODUTO_DESC) VALUES (?)";
    $conexao = conectarBanco();
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $stmt->close();
    $conexao->close();
}

function deleteCategoria($id){
    $sql = "DELETE FROM tb_tipo_produto WHERE TB_TIPO_PRODUTO_ID = ?";
    $conexao = conectarBanco();
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conexao->close();
}

function editarCategoria($nome, $id){
    $sql = "UPDATE tb_tipo_produto SET TB_TIPO_PRODUTO_DESC = ? WHERE TB_TIPO_PRODUTO_ID = ?";
    $conexao = conectarBanco();
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("si", $nome, $id);
    $stmt->execute();
    $stmt->close();
    $conexao->close();
}


?>