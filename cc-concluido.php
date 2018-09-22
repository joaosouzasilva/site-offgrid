<?php
include("conecta.php");
include("banco-usuario.php");

$cliente = buscaUsuarioCC($conexao, $_POST["email_mecanico"]);
if($mecanico == null)
{
    $email_cliente = $_POST["email_cliente"];
    $senha_cliente = $_POST["senha_cliente"];
    $nome_cliente = $_POST["nome_cliente"];

    if(cadastraC($conexao, $email_cliente, $senha_cliente, $nome_cliente)){
        header("Location: avaliar");
    }else{
        header("Location: cadastro-cliente");
    }
    die();
}else{
    header("Location: cadastro-cliente");
    die();
}