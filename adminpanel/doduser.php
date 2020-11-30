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
    $id_adres = $_POST['id_adres'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $firma = $_POST['firma'];
    $nip = $_POST['nip'];
    $nazwisko = $_POST['nazwisko'];
    $imie = $_POST['imie'];
    if(isset($_POST['dod'])) 
        $query="INSERT INTO klient (id_adres, email, login, haslo, firma, nip, nazwisko, imie) values ('".$id_adres."', '".$email."', '".$login."', '".$haslo."', '".$firma."' ,'".$nip."', '".$nazwisko."', '".$imie."')";
        $st=$pdo->query($query);
        header("Location: adduser.php");
?>