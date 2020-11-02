<?php
require "connect.php";
$imie=$nazwisko=$firma=$nip=$email = $username = $password = $confirm_password = "";
$imie_err=$nazwisko_err=$nip_err=$email_err = $username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty(trim($_POST["email"]))){
        $email_err = "Podaj email";
    }
    if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Podaj prawidłowy format e-mail";
      }
    else {
        $sql = "SELECT id_klient FROM klient WHERE email= :email";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);        
            $param_email = trim($_POST["email"]);
            if($stmt->execute()){
                
                if($stmt->rowCount() == 1){
                    $email_err = "Konto z tym adresem e-mail już istnieje";
                } else{
                    $email = trim($_POST["email"]);
                    $msg = 'Twoje konto zostało stworzone, zweryfikuj swój e-mail poprzez kliknięcie w link wtsłany na twój adres e-mail';
                }
            }
             else{
                echo "Coś poszło nie tak spróbuj ponownie później.";
            }
            unset($stmt);
        }
    }
   
    if(empty(trim($_POST["username"]))){
        $username_err = "Podaj login";
    } else{
        $sql = "SELECT id_klient FROM klient WHERE login= :login";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":login", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Ta nazwa użytkownika już istnieje";
                } else{
                    $username = trim($_POST["username"]);
                }
            }
             else{
                echo "Coś poszło nie tak spróbuj ponownie później.";
            }
            unset($stmt);
        }
    }
    
    if(empty(trim($_POST["imie"]))){
        $imie_err = "Proszę podać imie";     
    } elseif(!preg_match('/^[a-zA-Z\s]+$/', $_POST["imie"])){
        $imie_err = "Imie powinno zawierać tylko litery";
    } else{
        $imie = trim($_POST["imie"]);
    }

    $firma = trim($_POST["firma"]);

    if (!preg_match('/^[1-9][0-9]{0,9}$/', $_POST["nip"]) && !empty($_POST["nip"])){
        $nip_err = "Podaj prawidłowy format lub/i długość";
    }
    else{
        $nip=trim($_POST["nip"]);
    }

    if(empty(trim($_POST["nazwisko"]))){
        $nazwisko_err = "Proszę podać nazwisko";     
    } elseif(!preg_match('/^[a-zA-Z\s]+$/', $_POST["nazwisko"])){
        $nazwisko_err = "Nazwisko powinno zawierać tylko litery";
    } else{
        $nazwisko = trim($_POST["nazwisko"]);
    }

       

    if(empty(trim($_POST["password"]))){
        $password_err = "Proszę podać hasło";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Hasło powinno mieć więcej niż 6 znaków ";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Powtórz Hasło";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasła nie są takie same";
        }
    }

    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($imie_err) && empty($nazwisko_err) && empty($nip_err) ){
        $token = bin2hex(random_bytes(16));
        $sql = "INSERT INTO klient (email, login, haslo, firma, nip, nazwisko, imie, token) VALUES (:email, :login, :haslo, :firma, :nip, :nazwisko, :imie, :token)";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":firma", $firma, PDO::PARAM_STR);
            $stmt->bindParam(":nip", $nip, PDO::PARAM_STR);
            $stmt->bindParam(":nazwisko", $nazwisko, PDO::PARAM_STR);
            $stmt->bindParam(":imie", $imie, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":login", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":haslo", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":token", $token, PDO::PARAM_STR);
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

        if($stmt->execute()){
         $to = $email; 
         $subject = 'Rejestracja | Weryfikacja'; 
         $message = '
  
Dziękujemy, że wybrałeś nasz sklep!
Aby twoje konto mogło zostać aktywowane musisz kliknąć link znajdujący się poniżej
  
------------------------
Imie:'.$imie.'
Nazwisko: '.$nazwisko.'
Firma:'.$firma.'
NIP:'.$nip.'
Username: '.$username.'

------------------------
  
Kliknij ten link aby aktywować konto:
http://127.0.0.1/verify.php?email='.$email.'&token='.$token.'
  
'; 
                      
         $headers = 'From:noreply@yourwebsite.com' . "\r\n"; 
        mail($to, $subject, $message, $headers); 
        echo ("<script LANGUAGE='JavaScript'>
          window.alert($msg);
          window.location.href='127.0.0.1/login.php';
       </script>");

                
        } 
            else{
                echo "Coś poszło nie tak, spróbuj ponownie później";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <div class="wrapper">
        <h2>Rejestracja</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           <div class="form-group <?php echo (!empty($nazwisko_err)) ? 'has-error' : ''; ?>">
                <label>Nazwisko</label>
                <input type="text" name="nazwisko" class="form-control" value="<?php echo $nazwisko; ?>">
                <span class="help-block"><?php echo $nazwisko_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($imie_err)) ? 'has-error' : ''; ?>">
                <label>Imie</label>
                <input type="text" name="imie" class="form-control" value="<?php echo $imie; ?>">
                <span class="help-block"><?php echo $imie_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nazwa Użytkownika</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Hasło</label>
                <input type="password" name="password" class="form-control" >
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Powtórz Hasło</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Firma</label>
                <input type="text" name="firma" class="form-control" value="<?php echo $firma; ?>" placeholder="(opcjonalne)">
               
            </div>
            <div class="form-group <?php echo (!empty($nip_err)) ? 'has-error' : ''; ?>">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="<?php echo $nip; ?>" placeholder="(opcjonalne)">
                <span class="help-block"><?php echo $nip_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Zarejestruj">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
           
            <p>Masz już konto? <a href="login.php">Zaloguj się</a>.</p>
        </form>
    </div>    
</body>
</html>

