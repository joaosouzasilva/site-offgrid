<?php
require_once("logica-login.php");
logoutC();
$_SESSION["logout_sucesso_c"] = "Você saiu";
header("Location: index");
die();