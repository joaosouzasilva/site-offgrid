<?php
include("conecta.php");
include("banco-usuario.php");
include("logica-login.php");
$cliente = buscaUsuarioC($conexao, $_POST["email_cliente"], $_POST["senha_cliente"]);
if($cliente == null){
    $_SESSION["deslogado_c"] = "Usuário ou senha invalida";
    header("Location: index");
}else{
    $_SESSION["logado_c"] = "Usuário logado";
    logaC($cliente["email_cliente"]);
    header("Location: avaliar");
}
die();