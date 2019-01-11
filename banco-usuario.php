<?php
require_once("conecta.php");
function buscaUsuarioM($conexao, $email, $senha){
    $senhaMD5 = md5($senha);
    $email = mysqli_real_escape_string($conexao, $email);
    $query = "select * from mecanicos where email_mecanico = '{$email}' and senha_mecanico = '{$senhaMD5}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
function buscaUsuarioC($conexao, $email, $senha){
    $senhaMD5 = md5($senha);
    $email = mysqli_real_escape_string($conexao, $email);
    $query = "select * from clientes where email_cliente = '{$email}' and senha_cliente = '{$senhaMD5}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
function buscaUsuarioPorID($conexao, $id){
    $query = "select * from clientes where id = '{$id}";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
function buscaUsuarioMC($conexao, $email){
    $email = mysqli_real_escape_string($conexao, $email);
    $query = "select * from mecanicos where email_mecanico = '{$email}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
function buscaUsuarioCC($conexao, $email){
    $email = mysqli_real_escape_string($conexao, $email);
    $query = "select * from clientes where email_cliente = '{$email}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
function cadastraM($conexao, $nome_oficina, $telefone_oficina, $cep_oficina, $estado_oficina, $cidade_oficina, $bairro_oficina, $endereco_oficina, $numero_endereco, $complemento, $email_mecanico, $senha_mecanico){
    $senhaMMD5 = md5($senha_mecanico);
    $query = "insert into mecanicos (nome_oficina, telefone_oficina, cep_oficina, estado_oficina, cidade_oficina, bairro_oficina, endereco_oficina, numero_endereco, complemento, email_mecanico, senha_mecanico) values ('{$nome_oficina}', '{$telefone_oficina}', '{$cep_oficina}', '{$estado_oficina}', '{$cidade_oficina}', '{$bairro_oficina}', '{$endereco_oficina}', '{$numero_endereco}', '{$complemento}', '{$email_mecanico}', '{$senhaMMD5}')";
    return mysqli_query($conexao, $query);
}
function cadastraC($conexao, $email_cliente, $senha_cliente, $nome_cliente){
    $senhaCMD5 = md5($senha_cliente);
    $query = "insert into clientes (email_cliente, senha_cliente, nome_cliente) values ('{$email_cliente}', '{$senhaCMD5}', '{$nome_cliente}')";
    return mysqli_query($conexao, $query);
}
function adicionaAvaliacao($conexao, $texto, $nota, $mecanico, $cliente){
    $query = "insert into comentarios (texto, nota, mecanico_id, cliente_id) values ('${texto}', '${nota}', '${mecanico}', '${cliente}')";
    echo $query;
    return mysqli_query($conexao, $query);
}
function NPS($conexao, $id, $total){
    $query_detratores = "select * from comentarios where mecanico_id = '{$id}' and nota <= 3";
    $query_promotores = "select * from comentarios where mecanico_id = '{$id}' and nota = 5";
    $detratores = mysqli_query($conexao, $query_detratores);
    $promotores = mysqli_query($conexao, $query_promotores);
    $num_detratores = mysqli_num_rows($detratores);
    $num_promotores = mysqli_num_rows($promotores);
    return ($num_promotores - $num_detratores) * 10 / $total;
}
function media($conexao, $id){
    $query = "select avg(nota) from comentarios where mecanico_id = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);;
}
function adicionaMecanico($conexao, $nome, $bairro, $logradouro, $numero){
    $query = "insert into mecanicos (nome_oficina, bairro_oficina, endereco_oficina, numero_endereco) values ('{$nome}', '{$bairro}', '{$logradouro}', '{$numero}')";
    return mysqli_query($conexao, $query);
}