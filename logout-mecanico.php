<?php
require_once("logica-login.php");
logoutM();
$_SESSION["logout_sucesso_m"] = "Você saiu";
header("Location: index");
die();