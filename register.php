<?php
require "connect.php";
$email = $username = $password = $confirm_password = "";
$email_err = $username_err = $password_err = $confirm_password_err = "";
 
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

    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO klient (email, login, haslo) VALUES (:email, :login, :haslo)";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":login", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":haslo", $param_password, PDO::PARAM_STR);
        
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            if($stmt->execute()){
                header("location: login.php");
            } else{
                echo "Coś poszło nie tak, spróbuj ponownie później";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{ 
            width: 350px; 
            padding: 20px;
            align: center;
            margin-left: auto;
            margin-right: auto;
         }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Rejestracja</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                <input type="submit" class="btn btn-primary" value="Zarejestruj">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Masz już konto? <a href="login.php">Zaloguj się</a>.</p>
        </form>
    </div>    
</body>
</html>

