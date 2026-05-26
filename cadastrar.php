<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Página de cadastro</title>
    <link rel="icon" type="image/png" href="img/logo_favicon.png">
</head>
<body>
    <div class="login-container">
        <div class="logo">SOFIST<span>CASA</span></div>
        <h1>Cadastre-se</h1>
        <p>Acesse sua conta</p>

        <form action="controllers/con_usuario.php?funcao=cadastrar" method="POST">
            <input type="text" name="nome" placeholder="nome" required>
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>