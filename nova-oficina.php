<?php
require_once("banco-usuario.php");
require_once("logica-login.php");

$nome = $_POST["nome"];
$bairro = $_POST["bairro"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];

adicionaMecanico($nome, $bairro, $logradouro, $numero);
