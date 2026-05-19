<?php
session_start();

function login($usuario, $senha){
    if($usuario === "admin" && $senha == "1234"){
        $_SESSION['usuario']=$usuario;
        $_SESSION['logado']= true;
        header('Location: ../index.php');
    }else{
        $_SESSION['erro']="Usuário ou senha incorretos";
        header('Location; ../login.php')
    }
    exit();
}

$usuario=$_POST['usuario'];
$senha=$_POST['senha'];

login($usuario, $senha);

?>