<?php
include("logica-login.php");
logoutC();
header("Location: index.php?logout_c=true");
die();