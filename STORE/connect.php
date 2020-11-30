<?php

    $host ='localhost';
    $user ='root';
    $pass ='';
    $db ='sklep';

    try{
        $pdo = new PDO('mysql:host='.$host.';dbname='.$db,$user,$pass);
        $pdo->exec("set names utf8");
    }catch(PDOException $e){
        echo "Blad Polaczenia";
        die();
    }

   
?>
