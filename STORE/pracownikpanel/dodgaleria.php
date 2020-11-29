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
    $id_produkt = $_POST['id_produkt'];
    $nazwa = $_POST['nazwa'];
    if(isset($_POST['dod'])) {
        $query="INSERT INTO galeria (id_produkt, nazwa_zdj) values ('".$id_produkt."', '".$nazwa."')";
        $st=$pdo->query($query);
        header("Location: addgaleria.php");
    }
?>