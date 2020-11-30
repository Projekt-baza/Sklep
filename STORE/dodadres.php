<?php
session_start();
require "connect.php";
$miasto=$miejsc=$woj=$kod=$ul=$nrd=$nrm="";
$miasto_err=$miejsc_err=$woj_err=$kod_err=$ul_err=$nrd_err=$nrm_err="";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["miast"]))){
        $miasto_err = "Proszę podać miasto";     
    } elseif(!preg_match( '/^[a-ząćęłńóśźż\s]+$/ui', $_POST["miast"])){
        $miasto_err = "Miasto powinno zawierać tylko litery";
    } else{
        $miasto = trim($_POST["miast"]);
    }

    if(empty(trim($_POST["miejscowosc"]))){
        $miejsc_err = "Proszę podać miejscowość";     
    } elseif(! preg_match('/^[a-ząćęłńóśźż\s]+$/ui', $_POST["miejscowosc"])){
        $miejsc_err = "Miejscowość powinna zawierać tylko litery";
    } else{
        $miejsc= trim($_POST["miejscowosc"]);
    }

    if(empty(trim($_POST["wojewodztwo"]))){
        $woj_err = "Proszę podać województwo";     
    } elseif(!preg_match( '/^[a-ząćęłńóśźż\s]+$/ui', $_POST["wojewodztwo"])){
        $woj_err = "Województwo powinno zawierać tylko litery";
    } else{
        $woj = trim($_POST["wojewodztwo"]);
    }

    if(empty(trim($_POST["kod"]))){
        $kod_err = "Proszę podać kod pocztowy";   
    }
   else if( !preg_match('/^[0-9]{2}-?[0-9]{3}$/Du', $_POST['kod']) ){
       $kod_err="Podaj prawidłowy format";
   }
   else{
       $kod=trim($_POST['kod']);
   }

   if(empty(trim($_POST["ulica"]))){
    $ul_err = "Proszę podać ulice";     
} else{
    $ul = trim($_POST["ulica"]);
}

if(empty(trim($_POST["nrd"]))){
    $nrd_err = "Proszę podać nr domu";     
} else{
    $nrd = trim($_POST["nrd"]);
}

 $nrm = trim($_POST['nrm']);


if(empty($miasto_err) && empty($miejsc_err) && empty($woj_err) && empty($kod_err) && empty($ul_err) && empty($nrd_err) ){
    $sql5 = "INSERT INTO adres (id_adres, miasto, miejscowosc, wojewodztwo, kod_pocztowy, ulica, nr_domu, nr_mieszkania) VALUES (null, :m, :ms, :w, :kp, :ul, :nd, :nm)";
    if($stmt5 =$pdo->prepare($sql5)){
        $stmt5->bindParam(":m", $miasto, PDO::PARAM_STR);
        $stmt5->bindParam(":ms", $miejsc, PDO::PARAM_STR);
        $stmt5->bindParam(":w", $woj, PDO::PARAM_STR);
        $stmt5->bindParam(":kp", $kod, PDO::PARAM_STR);
        $stmt5->bindParam(":ul", $ul, PDO::PARAM_STR);
        $stmt5->bindParam(":nd", $nrd, PDO::PARAM_STR);
        $stmt5->bindParam(":nm", $nrm, PDO::PARAM_STR);
        
        
        if($stmt5->execute()){
        $sql3 =$pdo->prepare("SELECT id_adres FROM adres ORDER BY id_adres DESC limit 1");
        $sql3->execute();
        $klient = $sql3->fetch(PDO::FETCH_ASSOC);
        $sql2 = $pdo->prepare("UPDATE klient SET id_adres = :klient where email= :klient1");
        $sql2->bindParam(":klient", $klient["id_adres"], PDO::PARAM_STR);
        $sql2->bindParam(":klient1", $_SESSION['username'], PDO::PARAM_STR);
        $sql2->execute();
        $_SESSION['idadres']=$klient["id_adres"];
        echo '<script type="text/javascript">'; 
        echo 'alert("Dodano twój adres");'; 
        echo 'window.location.href = "index.php?page=cart"';
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
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dodaj Adres</title>
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
                                    <div class="card-login-header"><h3 class="text-center header-login-text my-4">Dodaj Adres</br>Bez Polskich Znaków</h3></div>
                                    <div class="card-body bg-login">
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                 <div class="form-row">
              <div class="form-group <?php echo (!empty($miasto_err)) ? 'has-error' : ''; ?>">
                <label>Miasto</label>
                <input type="text" name="miast" class="form-control" value="<?php echo $miasto; ?>">
                <span class="help-block"><?php echo $miasto_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($miejsc_err)) ? 'has-error' : ''; ?>">
                <label>Miejscowosc</label>
                <input type="text" name="miejscowosc" class="form-control" value="<?php echo $miejsc; ?>">
                <span class="help-block"><?php echo $miejsc_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($woj_err)) ? 'has-error' : ''; ?>">
                <label>Wojewodztwo</label>
                <input type="text" name="wojewodztwo" class="form-control" value="<?php echo $woj; ?>">
                <span class="help-block"><?php echo $woj_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($kod_err)) ? 'has-error' : ''; ?>">
                <label>Kod pocztowy</label>
                <input type="text" name="kod" class="form-control" value="<?php echo $kod; ?>">
                <span class="help-block"><?php echo $kod_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($ul_err)) ? 'has-error' : ''; ?>">
                <label>Ulica</label>
                <input type="text" name="ulica" class="form-control"  value="<?php echo $ul; ?>">
                <span class="help-block"><?php echo $ul_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($nrd_err)) ? 'has-error' : ''; ?>">
                <label>nr domu</label>
                <input type="text" name="nrd" class="form-control" value="<?php echo $nrd; ?>">
                <span class="help-block"><?php echo $nrd_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($nrm_err)) ? 'has-error' : ''; ?>">
                <label>nr mieszkania</label>
                <input type="text" name="nrm" class="form-control" value="<?php echo $nrm; ?>" placeholder="(opcjonalne)">
               
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Dodaj Adres">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
