<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["username"]);
unset($_SESSION['idadres']);
unset($_SESSION['rodzaj']);
header("Location: index.php?page=home");
?>