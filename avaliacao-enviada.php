<?php
require_once("banco-usuario.php");
require_once("logica-login.php");
$nota = $_POST["nota"];
$texto = $_POST["texto"];
$mecanico = $_POST["mecanico_id"];
$cliente = buscaUsuarioCC($conexao, $_SESSION["cliente_logado"]);
if(adicionaAvaliacao($conexao, $texto, $nota, $mecanico, $cliente['id'])){
    $query = "update clientes set agendado = '0' where id = '{$cliente["id"]}'";
    mysqli_query($conexao, $query);
    $_SESSION["avaliacao_enviada"] = "Avaliação enviada.";
    
}
else{
    
}