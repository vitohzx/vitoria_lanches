<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastrar.css">
</head>
<body>
    <div class="container">
        <div class="menu">

        </div>
        <form action="../../index.php" method="post">
            <span class="titulo"> Criar Conta </span>
            <input type="text" name="user" id="" placeholder="Username" required>
            <input type="text" name="senha" id="" placeholder="Senha" required>
            <input type="text" name="senhaC" id="" placeholder="Confirmar senha" required>
            <input type="submit" value="Cadastrar">
            <input type="hidden" name="acao" value="cadastrar">
        </form>
    </div>
</body>
</html>