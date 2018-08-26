<?php
session_start();
function mecanicoLogado(){
    return isset($_SESSION["mecanico_logado"]);
}
function verificaLoginM(){
    if(!mecanicoLogado()){
        $_SESSION["deslogado_m"] = "Você não está logado.";
        header("Location: index");
        die();
    }
}
function clienteLogado(){
    return isset($_SESSION["cliente_logado"]);
}
function verificaLoginC(){
    if(!clienteLogado()){
        $_SESSION["deslogado_c"] = "Você não está logado.";
        header("Location: index");
        die();
    }
}
function logaM($email){
    $_SESSION["mecanico_logado"] = $email;
}
function logaC($email){
    $_SESSION["cliente_logado"] = $email;
}