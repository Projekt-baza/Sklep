<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dodaj Użytkownika</title>
        <link rel="icon" href="img/flexstore.png" type="image/icon type">
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

      <!--Logo-->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">FLEXYstore</a>

            <!--Nav left button-->
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

            <!-- Navbar Search-->
            

            <!-- Navbar top-->

            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-alt"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                     
                        <a class="dropdown-item" href="/logoutcms.php">Wyloguj się</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Navbar left-->

                <!-- Navbar left-->
                <div id="layoutSidenav">
                    <div id="layoutSidenav_nav">
                        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                            <div class="sb-sidenav-menu">
                                <div class="nav">

                           <div class="sb-sidenav-menu-heading">Administracja</div>


                           <a class="nav-link collapsed" href="../index-admin.php">
                               <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>Zamówienia
                           </a>

                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                               <div class="sb-nav-link-icon"><i class="fas fa-tshirt"></i></div>Produkty
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                 <a class="nav-link collapsed" href="addproduct.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="minusproduct.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                                 </a>
                                 <a class="nav-link collapsed" href="editproduct.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div> Edytuj
                                 </a>

                               </nav>
                           </div>
                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmployee" aria-expanded="false" aria-controls="collapseEmployee">
                               <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>Pracownicy
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="collapseEmployee" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                 <a class="nav-link collapsed" href="addemployee.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="minusemployee.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div>Usuń
                                 </a>

                               </nav>
                           </div>
                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                               <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>Użytkownicy
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                 <a class="nav-link collapsed" href="adduser.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="minususer.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div>Usuń
                                 </a>

                               </nav>
                           </div>

                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAddress" aria-expanded="false" aria-controls="collapseAddress">
                               <div class="sb-nav-link-icon"><i class="fas fa-road"></i></div>Adresy
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="collapseAddress" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                 <a class="nav-link collapsed" href="addaddress.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="minusaddress.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                                 </a>
                                 <a class="nav-link collapsed" href="editaddress.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div> Edytuj
                                 </a>

                               </nav>
                           </div>

                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategoria" aria-expanded="false" aria-controls="collapseKategoria">
                               <div class="sb-nav-link-icon"><i class="fas fa-dog"></i></div>Kategoria
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="collapseKategoria" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                 <a class="nav-link collapsed" href="addkategoria.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="minuskategoria.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                                 </a>

                               </nav>
                           </div>

                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducent" aria-expanded="false" aria-controls="collapseProducent">
                               <div class="sb-nav-link-icon"><i class="fas fa-cat"></i></div>Producent
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="collapseProducent" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                 <a class="nav-link collapsed" href="addproducent.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="minusproducent.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                                 </a>
                                 <a class="nav-link collapsed" href="editproducent.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div> Edytuj
                                 </a>

                               </nav>
                           </div>
                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGaleria" aria-expanded="false" aria-controls="collapseGaleria">
                               <div class="sb-nav-link-icon"><i class="fas fa-dove"></i></div>Galeria
                               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                           </a>
                           <div class="collapse" id="collapseGaleria" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                 <a class="nav-link collapsed" href="addgaleria.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="minusgaleria.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                                 </a>
                               </nav>
                           </div>

                                     <div class="sb-sidenav-menu-heading">Strona</div>
                                    <a class="nav-link nav-active-link" href="/cmsgl.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                        Wyloguj się i przejdź na stronę
                                    </a>

                                </div>
                            </div>
                            <div class="sb-sidenav-footer">
                                <div class="small">Zalogowany jako:</div>
                                Admin
                            </div>
                        </nav>
                    </div>

            <div id="layoutSidenav_content">



              <main>

             <!-- ZAWARTOSC----------------------------------------------------------------------------------------------------->
             <?php
require "connect.php";

if (isset($_SESSION['rodzaj'])){
    if ($_SESSION['rodzaj']=='Pracownik'){
        header("location: /index-pracownik.php");
    }
    }
    else{
        header("location: /logowaniecms.php");
    }
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
        $sql = "INSERT INTO pracownik (id_adres, email, login, haslo, nip, nazwisko, imie, rodzaj_pracownika, token) VALUES (:adres, :email, :login, :haslo, :nip, :nazwisko, :imie,:rodzaj, :token)";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":adres", $_POST['id_adres'], PDO::PARAM_STR);
            $stmt->bindParam(":nip", $nip, PDO::PARAM_STR);
            $stmt->bindParam(":nazwisko", $nazwisko, PDO::PARAM_STR);
            $stmt->bindParam(":imie", $imie, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":login", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":haslo", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":token", $token, PDO::PARAM_STR);
            $stmt->bindParam(":rodzaj", $_POST['rodzaj'], PDO::PARAM_STR);
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
http://127.0.0.1/verifyemplo.php?email='.$email.'&token='.$token.'
  
'; 
                      
         $headers = 'From:noreply@yourwebsite.com' . "\r\n"; 
        mail($to, $subject, $message, $headers); 

        echo '<script type="text/javascript">'; 
        echo 'alert("review your answer");'; 
        echo 'window.location.href = "adduser.php";';
        echo '</script>';

                
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
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rejestracja</title>
        <link rel="icon" href="img/flexstore.png" type="image/icon type">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container more-margin-bottom">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="shadow-lg border-login mt-5">
                                    <div class="card-login-header"><h3 class="text-center header-login-text my-4">Utwórz konto</h3></div>
                                    <div class="card-body bg-login">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <div class="form-row">
                                              <div class="form-group <?php echo (!empty($nazwisko_err)) ? 'has-error' : ''; ?>">

                                              <label>Adres</label>
                                      <select id="id_adres" name="id_adres" class="form-control">
                                      <?php

                                        $query='SELECT id_adres, miasto, miejscowosc, wojewodztwo, kod_pocztowy, ulica, nr_domu, nr_mieszkania from adres';
                                        $st=$pdo->query($query);
                                            if($st == true){
                                                while($row=$st->fetch()){
                                                   ?> <option value="<?php echo $row["id_adres"] ?>" ><?php echo $row["miasto"]." ".$row["miejscowosc"]." ".$row["wojewodztwo"]." ".$row["kod_pocztowy"]." ".$row["ulica"]." ".$row["nr_domu"]." ".$row["nr_mieszkania"]."</td>"; ?></option><?php
                                                } 
                                            }

                                    
                                    ?>
                                    </select>
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
            <div class="form-group <?php echo (!empty($nip_err)) ? 'has-error' : ''; ?>">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="<?php echo $nip; ?>" placeholder="(opcjonalne)">
                <span class="help-block"><?php echo $nip_err; ?></span>
            </div>
            <div class="form-group">
            <label>Rodzaj</label>
            <select name="rodzaj" class="form-control">
                                      <option value="Admin">Admin</option>
                                      <option value="Pracownik">Pracownik</option>
                                      </select>
            </div>
            <div class="form-group">
                 <input type="hidden" name="dod" >
                <input type="submit" class="btn btn-primary" value="Zarejestruj">
            </div>
                                        </form>
                                    </div>
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
                            <div class="text-muted">Copyright &copy; Jastrzębska Hepner Gastołek 2020</div>
                           
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

              </main>



            


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    </body>
</html>
