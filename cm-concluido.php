<?php
require_once("banco-usuario.php");
require_once("logica-login.php");

$mecanico = buscaUsuarioMC($conexao, $_POST["email_mecanico"]);
if($mecanico == null)
{
    $nome_oficina = $_POST["nome_oficina"];
    $telefone_oficina = $_POST["telefone_oficina"];
    $cep_oficina = $_POST["cep_oficina"];
    $estado_oficina = $_POST["estado_oficina"];
    $cidade_oficina = $_POST["cidade_oficina"];
    $bairro_oficina = $_POST["bairro_oficina"];
    $endereco_oficina = $_POST["endereco_oficina"];
    if(isset($_POST["numero_endereco"])){
        $numero_endereco = $_POST["numero_endereco"];
    }else{
        $numero_endereco = '';
    }
    if(isset($_POST["complemento"])){
        $complemento = $_POST["complemento"];
    }else{
        $complemento = '';
    }
    $email_mecanico = $_POST["email_mecanico"];
    $senha_mecanico = $_POST["senha_mecanico"];

    if(cadastraM($conexao, $nome_oficina, $telefone_oficina, $cep_oficina, $estado_oficina, $cidade_oficina, $bairro_oficina, $endereco_oficina, $numero_endereco, $complemento, $email_mecanico, $senha_mecanico)){
        logaM($mecanico["email_mecanico"]);
        header("Location: avaliacoes");
    }else{
        header("Location: index");
    }
    die();
}else{
    header("Location: cadastro-mecanico");
    die();
}