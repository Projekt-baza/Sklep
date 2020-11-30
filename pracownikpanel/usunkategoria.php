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
        if(isset($_POST['execute'])) {
            $id_kategoria=$_POST['execute'];
            $query=("DELETE  from kategoria where id_kategoria = '$id_kategoria'");
            $pdo->query($query);
            header("Location: minuskategoria.php");
        }
?>	