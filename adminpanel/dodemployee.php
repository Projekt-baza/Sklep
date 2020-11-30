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
    $adr = $_POST['id_adres'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $nip = $_POST['nip'];
    $nazwisko = $_POST['nazwisko'];
    $imie = $_POST['imie'];
    if(isset($_POST['dod'])) {
                $query="INSERT INTO pracownik (id_adres, email, login, haslo, nip, nazwisko, imie, rodzaj_pracownika) values ('".$adr."', '".$email."', '".$login."', '".$haslo."', '".$nip."' ,'".$nazwisko."', '".$imie."', 'zwykły')";
                $st=$pdo->query($query);
                header("Location: addemployee.php");
    }
?>