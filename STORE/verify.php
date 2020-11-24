<?php
 require "connect.php";
 if(isset($_GET["email"]) && isset($_GET["token"])){
     $token = trim($_GET["token"]);
     $email = trim($_GET["email"]);
     $sql = "SELECT COUNT(*) AS num FROM klient WHERE email = :email and token = :token and potwierdz='0'" ;
     $stmt = $pdo->prepare($sql);
   
     $stmt->bindParam(':email', $email);
     $stmt->bindParam(':token', $token);
     $stmt->execute();
     $result = $stmt->fetch(PDO::FETCH_ASSOC);
     
     if($result['num'] == 1){
        $sql = "UPDATE klient SET potwierdz='1' where email = :email and token = :token and potwierdz ='0' ";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        echo '<div class="container more-margin-bottom">'.'
        <div class="row justify-content-center">'.
            '<div class="col-lg-7">'.'<div class="shadow-lg border-login mt-5">'.'<h3>Twoje konto z adresem e-mail:</h3>'.'<h4 class="active">'.$email.'</h4>'.'<h3> zostało pomyślnie aktywowane</h3>'.
        '<a href="index.php?page=logowanie">'.'<button class="btn btn-danger">Zaloguj się</button>'.'</a>'.'<a href=index.php?page=home>'.'<button class="btn btn-warning">Strona Główna</button>'.'</a>'.
        
        '</div>';
    } 
    else{
        echo '<div class="container more-margin-bottom">'.'
        <div class="row justify-content-center">'.'
            <div class="col-lg-7">'.'<div class="shadow-lg border-login mt-5">'.'<h3>Posiadasz zły link lub twoje konto zostało już aktywowane</h3>'.'<h3>Przepraszamy za wszelkie utrudnienia</h3>'.
        '<a href="index.php?page=logowanie">'.'<button class="btn btn-danger">Zaloguj się</button>'.'</a>'.'<a href=index.php?page=home>'.'<button class="btn btn-warning">Strona Główna</button>'.'</a>'.
        '</div>'.'</div>'.'</div>'.'</div>';
    }
 }
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">        
<link rel="stylesheet" href="css/styles.css" >
</head>
<body>
    </div>    
</body>
</html>