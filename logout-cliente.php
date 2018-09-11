<?php
include("logica-login.php");
logoutC();
$_SESSION["logout_sucesso_c"] = "Você saiu";
header("Location: index");
die();