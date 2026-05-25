<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title>SOFISTCASA</title>
    <link rel="icon" type="image/png" href="img/logo_favicon.png">
</head>
<header>
    <a href="index.php">SOFIST<span class="logo">CASA<span></a>
    <nav>
        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="login.php">Login</a></li>
            <?php if(isset($_SESSION['usuario']) && $_SESSION['logado'] == true): ?>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Contato</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
</html>