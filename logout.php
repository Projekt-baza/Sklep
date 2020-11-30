<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["username"]);
unset($_SESSION['idadres']);
header("Location:index.php?page=home");
?>