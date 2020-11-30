<?php
session_start();
unset($_SESSION["idcms"]);
unset($_SESSION["usernamecms"]);
unset($_SESSION['idadrescms']);
unset($_SESSION['rodzaj']);
header("Location: logowaniecms.php");
?>