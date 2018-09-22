<?php
function buscaUsuarioM($conexao, $email, $senha){
    $senhaMD5 = md5($senha);
    $query = "select * from mecanicos where email_mecanico = '{$email}' and senha_mecanico = '{$senhaMD5}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
function buscaUsuarioC($conexao, $email, $senha){
    $senhaMD5 = md5($senha);
    $query = "select * from clientes where email_cliente = '{$email}' and senha_cliente = '{$senhaMD5}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
function buscaUsuarioMC($conexao, $email){
    $query = "select * from mecanicos where email_mecanico = '{$email}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
function buscaUsuarioCC($conexao, $email){
    $query = "select * from clientes where email_cliente = '{$email}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
function cadastraM($conexao, $nome_oficina, $telefone_mecanico, $cnpj, $cep_oficina, $estado_oficina, $cidade_oficina, $bairro_oficina, $endereco_oficina, $numero_endereco, $complemento, $nome_mecanico, $email_mecanico, $celular_mecanico, $senha_mecanico){
    $senhaMMD5 = md5($senha_mecanico);
    $query = "insert into mecanicos (nome_oficina, telefone_mecanico, cnpj, cep_oficina, estado_oficina, cidade_oficina, bairro_oficina, endereco_oficina, numero_endereco, complemento, nome_mecanico, email_mecanico, celular_mecanico, senha_mecanico) values ('{$nome_oficina}', '{$telefone_mecanico}', '{$cnpj}', '{$cep_oficina}', '{$estado_oficina}', '{$cidade_oficina}', '{$bairro_oficina}', '{$endereco_oficina}', '{$numero_endereco}', '{$complemento}', '{$nome_mecanico}', '{$email_mecanico}', '{$celular_mecanico}', '{$senhaMMD5}')";
    return mysqli_query($conexao, $query);
}
function cadastraC($conexao, $email_cliente, $senha_cliente, $nome_cliente){
    $senhaCMD5 = md5($senha_cliente);
    $query = "insert into clientes (email_cliente, senha_cliente, nome_cliente) values ('{$email_cliente}', '{$senhaCMD5}', '{$nome_cliente}')";
    return mysqli_query($conexao, $query);
}