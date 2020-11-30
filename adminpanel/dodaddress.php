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
    $miasto = $_POST['miasto'];
    $miejscowosc = $_POST['miejscowosc'];
    $wojewodztwo = $_POST['wojewodztwo'];
    $kod_pocztowy = $_POST['kod_pocztowy'];
    $ulica = $_POST['ulica'];
    $nr_domu = $_POST['nr_domu'];
    $nr_mieszkania = $_POST['nr_mieszkania'];
    if(isset($_POST['dod'])) {
        if($nr_mieszkania==""){
            $query="INSERT INTO adres (miasto, miejscowosc, wojewodztwo, kod_pocztowy, ulica, nr_domu, nr_mieszkania) values ('".$miasto."', '".$miejscowosc."', '".$wojewodztwo."', '".$kod_pocztowy."', '".$ulica."' ,'".$nr_domu."', null)";
            $st=$pdo->query($query);
        }
        else{
                $query="INSERT INTO adres (miasto, miejscowosc, wojewodztwo, kod_pocztowy, ulica, nr_domu, nr_mieszkania) values ('".$miasto."', '".$miejscowosc."', '".$wojewodztwo."', '".$kod_pocztowy."', '".$ulica."' ,'".$nr_domu."', '".$nr_mieszkania."')";
                $st=$pdo->query($query);
            }
               

                header("Location: addaddress.php");
        }
    
?>