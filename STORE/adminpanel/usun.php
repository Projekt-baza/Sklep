<?php
        require "connect.php";
        if(isset($_POST['execute2'])) {
            $id_zamowienia=$_POST['execute2'];
            $query=("DELETE  from zamowienia_produkty WHERE id_zamowienia = '$id_zamowienia'");
            $pdo->query($query);
            $query=("DELETE  from zamowienia WHERE id_zamowienia = '$id_zamowienia'");
            $pdo->query($query);
            header("Location: index-pracownik.php");
        }
?>	