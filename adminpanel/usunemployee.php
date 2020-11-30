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
            $id_prac=$_POST['execute'];
            $query=("DELETE  from pracownik where id_prac = '$id_prac'");
            $pdo->query($query);
            header("Location: minusemployee.php");
        }
?>	