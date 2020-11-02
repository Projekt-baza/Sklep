<?php

session_start();
 
require "connect.php";
 

$username = $password = "";
$username_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    

    if(empty(trim($_POST["haslo"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["haslo"]);
    }
 
    if(empty($username_err) && empty($password_err)){
  
        $sql = "SELECT id_klient, login, haslo, potwierdz FROM klient WHERE potwierdz= '1' and (login = :username or email = :username)";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id_klient"];
                        $username = $row["login"];
                        $email = $row["email"];
                        $hashed_password = $row["haslo"];
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            

                            header("location: index.php");
                        } else{
                            $password_err = "Nieprawidłowe hasło";
                        }
                    }
                } else{
                    $username_err = "Nie prawidłowy login lub konto nie zostało aktywowane.";
                }
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
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <h2>Zaloguj się</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Login lub e-mail</label>
                <input type="text" name="username" class="form-control">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Hasło</label>
                <input type="password" name="haslo" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Nie masz jeszcze konta?<a href="register.php">Zarejestruj się</a>.</p>
        </form>
    </div>
</body>
</html>