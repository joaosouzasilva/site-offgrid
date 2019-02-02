<?php
require_once("banco-usuario.php");
require_once("logica-login.php");
$nota = $_POST["nota"];
$confianca = $_POST["confianca"];
$qualidade = $_POST["qualidade"];
$custo_beneficio = $_POST["custo_beneficio"];
$agilidade = $_POST["agilidade"];
$organizacao = $_POST["organizacao"];
$texto = $_POST["texto"];
$mecanico = $_POST["mecanico_id"];
$cliente = buscaUsuarioCC($conexao, $_SESSION["cliente_logado"]);
if(adicionaAvaliacao($conexao, $texto, $nota, $confianca, $qualidade, $custo_beneficio, $agilidade, $organizacao, $mecanico, $cliente['id'])){
    $query = "update clientes set agendado = '0' where id = '{$cliente["id"]}'";
    mysqli_query($conexao, $query);
    $_SESSION["avaliacao_enviada"] = "Avaliação enviada.";
    
}
else{
    $_SESSION["erro_avaliacao"] = "Desculpe, houve em problema, tente novamente";
}