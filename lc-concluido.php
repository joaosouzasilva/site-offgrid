<?php
require_once("banco-usuario.php");
require_once("logica-login.php");
$cliente = buscaUsuarioC($conexao, $_POST["email_cliente"], $_POST["senha_cliente"]);
if($cliente == null){
    $_SESSION["deslogado_c"] = "Usuário ou senha invalida";
    header("Location: index");
}else{
    logaC($cliente["email_cliente"]);
    header("Location: avaliar");
}
die();