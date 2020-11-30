<?php
    require "connect.php";
    session_start();
    if (isset($_SESSION['rodzaj'])){
        if ($_SESSION['rodzaj']=='Pracownik'){
            header("location: /index-pracownik.php");
        }
        }
        else{
            header("location: /logowaniecms.php");
        }
    $nazwa = $_POST['nazwa'];
    if(isset($_POST['dod'])) {
        $query="INSERT INTO producent (nazwa) values ('".$nazwa."')";
        $st=$pdo->query($query);
        header("Location: addproducent.php");
    }
?>