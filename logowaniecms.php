<?php

session_start();
 
require "connect.php";
 
if (isset($_SESSION['rodzaj'])){
    if($_SESSION['rodzaj']=="Admin"){
        header("location: index-admin.php");
    }
    else {
        header("location: index-pracownik.php");
    }
}
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
  
        $sql = "SELECT id_prac, id_adres, login, haslo, potwierdz, email, rodzaj_pracownika FROM pracownik WHERE potwierdz= '1' and (email = :username)";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id_prac"];
                        $email = $row["email"];
                        $hashed_password = $row["haslo"];
                        $a=$row["id_adres"];
                        $rodzaj=$row['rodzaj_pracownika'];
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedincms"] = true;
                            $_SESSION["idcms"] = $id;
                            $_SESSION["usernamecms"] = $username;  
                            $_SESSION["idadrescms"]=$a; 
                            $_SESSION["rodzaj"]=$rodzaj;   
                            
                            
                            if ($row['rodzaj_pracownika']== 'Admin'){
                                header("location: index-admin.php");
                            }
                            else {
                                header("location: index-pracownik.php");
                            }
                            
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
<!DOCTYPE html
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Logowanie</title>
        <link rel="icon" href="img/flexstore.png" type="image/icon type">
        <link rel = "icon" href="https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png" type = "image/x-icon">

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="shadow-lg border-login mt-5">
                                    <div class="card-login-header"><h3 class="text-center header-login-text">Zaloguj się</h3></div>
                                    <div class="card-body bg-login">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                      <label>e-mail</label>
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
                                     </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
