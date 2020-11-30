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
            $id_producent=$_POST['execute'];
            $query=("DELETE  from producent where id_producent = '$id_producent'");
            $pdo->query($query);
            header("Location: minusproducent.php");
        }
?>	