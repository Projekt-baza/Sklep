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
    $typ = $_POST['typ'];
    $opis = $_POST['opis'];
    $zdj = $_POST['zdj'];
    $cena_netto = $_POST['cena_netto'];
    $procent_vat = $_POST['procent_vat'];
    $id_kategoria = $_POST['id_kategoria'];
    $id_producent = $_POST['id_producent'];
    $ilosc = $_POST['ilosc'];
    if(isset($_POST['dod'])) {
        if($procent_vat=="5%"){
        $query="INSERT INTO produkt (nazwa, typ, opis, zdj, cena_netto, cena_brutto, procent_vat, id_kategoria, id_producent, ilosc) values ('".$nazwa."', '".$typ."', '".$opis."', '".$zdj."', '".$cena_netto."' ,'".$cena_netto."' *1.05, '".$procent_vat."', '".$id_kategoria."', '".$id_producent."', '".$ilosc."')";
        $st=$pdo->query($query);
      
        header("Location: addproduct.php");
        }else if($procent_vat=="8%"){
            $query="INSERT INTO produkt (nazwa, typ, opis, zdj, cena_netto, cena_brutto, procent_vat, id_kategoria, id_producent, ilosc) values ('".$nazwa."', '".$typ."', '".$opis."', '".$zdj."', '".$cena_netto."' ,'".$cena_netto."' *1.08, '".$procent_vat."', '".$id_kategoria."', '".$id_producent."', '".$ilosc."')";
            $st=$pdo->query($query);
           
            header("Location: addproduct.php");
            } else if($procent_vat=="23%"){
                $query="INSERT INTO produkt (nazwa, typ, opis, zdj, cena_netto, cena_brutto, procent_vat, id_kategoria, id_producent, ilosc) values ('".$nazwa."', '".$typ."', '".$opis."', '".$zdj."', '".$cena_netto."' ,'".$cena_netto."' *1.23, '".$procent_vat."', '".$id_kategoria."', '".$id_producent."', '".$ilosc."')";
                $st=$pdo->query($query);
               
                header("Location: addproduct.php");
                }
    }
?>