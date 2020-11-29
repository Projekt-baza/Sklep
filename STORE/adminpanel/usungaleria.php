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
        if(isset($_POST['execute'])) {
            $id_jpg=$_POST['execute'];
            $query=("DELETE  from galeria where id_jpg = '$id_jpg'");
            $pdo->query($query);
            header("Location: minusgaleria.php");
        }
?>	