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
            $id_adres=$_POST['execute'];
            $query=("DELETE  from adres where id_adres = '$id_adres'");
            $pdo->query($query);
            header("Location: minusaddress.php");
        }
?>	