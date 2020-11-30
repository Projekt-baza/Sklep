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
            $id_klient=$_POST['execute'];
            $query=("DELETE  from klient where id_klient = '$id_klient'");
            $pdo->query($query);
            header("Location: minususer.php");
        }
?>	