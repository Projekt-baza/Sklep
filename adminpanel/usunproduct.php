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
            $id_produkt=$_POST['execute'];
            $query=("DELETE  from produkt where id_produkt = '$id_produkt'");
            $pdo->query($query);
            header("Location: minusproduct.php");
        }
?>	