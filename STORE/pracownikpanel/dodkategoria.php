<?php
    require "connect.php";
    session_start();
    if (isset($_SESSION['rodzaj'])){
        if ($_SESSION['rodzaj']=='Admin'){
            header("location: /index-admin.php");
        }
        }
        else{
            header("location: /logowaniecms.php");
        }
    $nazwa = $_POST['nazwa'];
    if(isset($_POST['dod'])) {
        $query="INSERT INTO kategoria (nazwa) values ('".$nazwa."')";
        $st=$pdo->query($query);
        header("Location: addkategoria.php");
    }
?>