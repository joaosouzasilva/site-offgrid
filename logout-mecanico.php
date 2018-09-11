<?php
include("logica-login.php");
logoutM();
header("Location: index.php?logout_m=true");
die();