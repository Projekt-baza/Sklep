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
        echo '<div class="wrapper">'.'<p>Twoje konto z adresem e-mail:</p>'.'<p class="active">'.$email.'</p>'.'<p> zostało pomyślnie aktywowane</p>'.
        '<a href="login.php">'.'<button class="btn btn-danger">Zaloguj się</button>'.'</a>'.'<a href=index.php>'.'<button class="btn btn-warning">Strona Główna</button>'.'</a>'.
        
        '</div>';
    } 
    else{
        echo '<div class="wrapper">'.'<p>Posiadasz zły link lub twoje konto zostało już aktywowane</p>'.'<p>Przepraszamy za wszelkie utrudnienia</p>'.
        '<a href="login.php">'.'<button class="btn btn-danger">Zaloguj się</button>'.'</a>'.'<a href=index.php>'.'<button class="btn btn-warning">Strona Główna</button>'.'</a>'.
        '</div>';
    }
 }
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">        
<link rel="stylesheet" href="css/style.css" >
</head>
<body>
    </div>    
</body>
</html>