<?php
session_start();
$CAMINHO=__DIR__."/../data/users.json";

function carregar_arquivo(){
    global $CAMINHO;
    $arquivo=file_get_contents($CAMINHO);
    $usuarios=json_decode($arquivo, true);
    return $usuarios;
}

function salvar_arquivo($dados){
    global $CAMINHO;

    if(empty($dados)){
        return false;
    }

    file_put_contents(
        $CAMINHO , 
        json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );

    return true;
}

function cadastrar_usuario($nome , $email, $senha){
    if(empty($nome) || empty($email) || empty($senha)){
        return false;
    }

    $usuario=[
        "nome"=>$nome,
        "email"=>$email,
        "senha"=>$senha,
    ];

    $usuarios=carregar_arquivo();

    $usuarios[]=$usuario;

    print_r($usuarios);

    if(!salvar_arquivo($usuarios)){
        header("Location: ../cadastrar.php");
    }else{
        header("Location: ../login.php");
    }

}

function login($email, $senha){
    $usuarios=carregar_arquivo();

    foreach($usuarios as $usuario){

        if($email === $usuario['email'] && $senha == $usuario['senha']){
            $_SESSION['usuario']=$usuario;
            $_SESSION['logado']= true;
            header('Location: ../index.php');
        }else{
            var_dump($usuario);
            $_SESSION['erro']="Email ou senha incorretos";
            //header('Location: ../login.php');
        }
        
    }exit();
        
}

$funcao=$_GET['funcao'] ?? 'inicio';

if($funcao=='cadastrar'){
    cadastrar_usuario(
        $_POST['nome'],
        $_POST['email'],
        $_POST['senha']
    );
}elseif($funcao=='login'){
    $email=$_POST['email'];
    $senha=$_POST['senha'];

    var_dump($_POST);

    login($email, $senha);
}