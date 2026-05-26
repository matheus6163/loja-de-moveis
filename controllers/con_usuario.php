<?php
session_start();
$CAMINHO=__DIR__."/../data/users.json";

function carregar_arquivo(){
    global $CAMINHO;
    $arquivo=file_get_contents($CAMINHO);
    $usuarios=json_decode($arquivo);
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
       // header("Location: ../cadastrar.php");
    }else{
        header("Location: ../index.php");
    }

}


$funcao=$_GET['funcao'] ?? 'inicio';

if($funcao=='cadastrar'){
    cadastrar_usuario(
        $_POST['nome'],
        $_POST['email'],
        $_POST['senha']
    );
}