<?php
include("conecta.php");
include("banco-usuario.php");

$mecanico = buscaUsuarioMC($conexao, $_POST["email_mecanico"]);
if($mecanico == null)
{
    $nome_oficina = $_POST["nome_oficina"];
    $telefone_mecanico = $_POST["telefone_mecanico"];
    $cnpj = $_POST["cnpj"];
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
    $nome_mecanico = $_POST["nome_mecanico"];
    $email_mecanico = $_POST["email_mecanico"];
    if(isset($_POST["celular_mecanico"])){
        $celular_mecanico = $_POST["celular_mecanico"];
    }else{
        $celular_mecanico = '';
    }
    $senha_mecanico = $_POST["senha_mecanico"];

    if(cadastraM($conexao, $nome_oficina, $telefone_mecanico, $cnpj, $cep_oficina, $estado_oficina, $cidade_oficina, $bairro_oficina, $endereco_oficina, $numero_endereco, $complemento, $nome_mecanico, $email_mecanico, $celular_mecanico, $senha_mecanico)){
        header("Location: avaliacoes");
    }else{
        header("Location: cadastro-mecanico");
    }
    die();
}else{
    header("Location: cadastro-mecanico");
    die();
}