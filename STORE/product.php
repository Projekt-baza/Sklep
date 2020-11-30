<?php
$kat = $pdo->prepare("SELECT *from kategoria");
$kat->execute();
$ka = $kat->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id_produkt'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM produkt WHERE id_produkt = ?');
    $stmt->execute([$_GET['id_produkt']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $sql = $pdo->prepare("SELECT SUM(ilosc) as suma FROM zamowienia_produkty where id_produkt= ? and id_zamowienia in (SELECT id_zamowienia from zamowienia where przyjeto is null) ");
    $sql->execute([$_GET['id_produkt']]);
    $ilosc = $sql->fetch(PDO::FETCH_ASSOC);
    $_SESSION['ilosc']=$ilosc['suma'];
    $id=$product['id_produkt'];

    $sq =$pdo->prepare("SELECT nazwa_zdj from galeria where id_produkt = ?");
    
    $sq->execute([$_GET['id_produkt']]);
    $zdj=$sq->fetchAll(PDO::FETCH_ASSOC);


    if (!$product) {
        
        exit('Product does not exist!');
    }
} else {
    exit('Product does not exist!');
}
?>
<html>

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>FLEXYstore</title>
        <link rel="icon" href="img/flexstore.png" type="image/icon type">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style1.css" rel="stylesheet"/>
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
                        <ul class="k">
                            <li class="nav-item dropdown">
                                <a id="userDropdown" href="index.php?page=cart" role="button" ><i class="fas fa-shopping-cart"></i>
                                <?php
                                if(isset($_SESSION['items'])){
                                echo '<span>'.$_SESSION['items'].'</span>';
                                }
                                ?>
                                </a>
                              
                            </li>
                        </ul>
            <ul class="u">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-alt"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php
                     if(isset($_SESSION['username'])){
                        echo "<a class='dropdown-item' href='index.php?page=logout'>"."Wyloguj się"."</a>";                    
                     }
                     else{
                        echo "<a class='dropdown-item' href='logowanie.php'>"."Zaloguj się"."</a>";
                     } 
                    ?>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Navbar left-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">


                            <div class="sb-sidenav-menu-heading">Strony</div>
                            <a class="nav-link nav-active-link" href="index.php?page=home">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Strona Główna
                            </a>
                            <a class="nav-link" href="onas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                O nas
                            </a>
                            <a class="nav-link" href="kontakt.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                                Kontakt
                            </a>


                            <div class="sb-sidenav-menu-heading">Kategorie</div>
                            <?php foreach($ka as $kate):?>
                            <a class="nav-link" href="index.php?page=kat&id_kategoria=<?=$kate['id_kategoria']?>">
                                <div class="sb-nav-link-icon"></div>
                                <?=$kate['nazwa']?>
                            </a>
                            <?php endforeach; ?>
                            
                            

                          
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    <?php
                     if(isset($_SESSION['username'])){
                        echo"<div class='small'>"."Zalogowany jako:"."</div>";
                        echo $_SESSION["username"];                       
                     }
                     else{
                        echo "<div class='small'>"."<a href='logowanie.php'>"."Zaloguj się"."</a>"."</div>";
                     } 
                    ?>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
              <main>





              
    <div class="left">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/<?= $product['zdj']?>" >
    </div>
    <?php foreach($zdj as $zdj1): 
        ?>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/<?= $zdj1['nazwa_zdj']?>">
    </div>
    <?php endforeach; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
    <div class="content">
        <h1 class="name"><?=$product['nazwa']?></h1>
        <h4 class="name">
        <?php   
         $stmt2 = $pdo->prepare('SELECT nazwa as kategoria from kategoria where id_kategoria = (Select id_kategoria from produkt where id_produkt = :kat )');
         $stmt2->bindValue(':kat', $product['id_produkt'] , PDO::PARAM_STR);
         $stmt2->execute();
         while ($kategoria = $stmt2->fetch(PDO::FETCH_ASSOC)){
             $k=$kategoria['kategoria'];
         }
         echo "<p>".$k."</p>";      
        ?>
        </h4>
        <h5>
        <?php
        $sql = $pdo->prepare('SELECT nazwa as pro from producent where id_producent = (Select id_producent from produkt where id_produkt = :pro )');   
        $sql->bindValue(':pro', $product['id_produkt'] , PDO::PARAM_STR);
        $sql->execute();
        $pro=$sql->fetch(PDO::FETCH_ASSOC);
        echo "<p>".$pro['pro']."</p>";
        ?>
        </h5>
        <span class="price">
            <?=$product['cena_brutto']?>zł
        </span>
        <span class="netto">
            netto:
        <?=$product['cena_netto']?>zł(VAT:<?=$product['procent_vat']?>%)
        </span>
        </br></br>   
        <form action="index.php?page=cart" method="post">
            <?php
            ?>
            <input type="number" name="ilosc" value="0" min="0" max="<?=$product['ilosc']-$_SESSION['ilosc'];?>" placeholder="Quantity" required>
            <input type="hidden" name="id_produkt" value="<?=$product['id_produkt']?>">
            <input type="submit" value="Add To Cart" class="btn btn-secondary">
        </form>
    <div class="opis">
    <?=$product['opis']?>
    </div>
    </div>
    


              </main>
             

              <!--Footer-->
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    </body>
</html>