<?php
require_once("banco-usuario.php");
$nota = $_POST["nota"];
$texto = $_POST["texto"];
$mecanico = $_POST["mecanico_id"];
if(adicionaAvaliacao($conexao, $texto, $nota, $mecanico)){
    echo "True";
}
else{
    echo "False";
}