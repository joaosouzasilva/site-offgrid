<?php
require_once("banco-usuario.php");
require_once("logica-login.php");

$cliente = buscaUsuarioCC($conexao, $_POST["email_cliente"]);
if($cliente == null)
{
    $email_cliente = $_POST["email_cliente"];
    $senha_cliente = $_POST["senha_cliente"];
    $nome_cliente = $_POST["nome_cliente"];

    if(cadastraC($conexao, $email_cliente, $senha_cliente, $nome_cliente)){
        logaC($cliente["email_cliente"]);
        header("Location: oficinas");
    }else{
        header("Location: index");
    }
    die();
}else{
    $_SESSION["ja_cadastrado_C"] = "Você já está cadastrado.";
    header("Location: index");
    die();
}