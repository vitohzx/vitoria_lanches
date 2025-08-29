<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="../../index.php" method="post">
        <input type="text" name="user" id="" placeholder="Username" required>
        <input type="text" name="senha" id="" placeholder="Senha" required>
        <input type="submit" value="Logar">
        <input type="hidden" name="acao" value="logar">
        <a href="../cadastrar/cadastrar.php"><button type="button"> Cadastrar </button></a>
    </form>
</body>
</html>