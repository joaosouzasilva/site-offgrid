<?php
require_once("banco-usuario.php");
require_once("logica-login.php");
$mecanico = buscaUsuarioM($conexao, $_POST["email_mecanico"], $_POST["senha_mecanico"]);
if($mecanico == null){
    $_SESSION["deslogado_m"] = "Usuário ou senha invalida";
    header("Location: index");
}else{
    logaM($mecanico["email_mecanico"]);
    header("Location: avaliacoes");
}
die();