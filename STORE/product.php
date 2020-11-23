<?php

if (isset($_GET['id_produkt'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM produkt WHERE id_produkt = ?');
    $stmt->execute([$_GET['id_produkt']]);
    
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
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
                        <ul class="navbar-nav ml-auto ml-md-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-shopping-cart"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">*zawartość koszyka*</a>
                                </div>
                            </li>
                        </ul>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-alt"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logowanie.php">Zaloguj się</a>
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
                            <a class="nav-link nav-active-link" href="#">
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
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"></div>
                                Bluzy
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"></div>
                                Spodnie
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"></div>
                                Buty
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"></div>
                                T-shirt
                            </a>
                            

                            <div class="sb-sidenav-menu-heading">Informacje</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                                Pomoc
                            </a>
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
    <img class="rounded mx-auto d-block" src="img/<?=$product['zdj']?>" alt="<?=$product['nazwa']?>">
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
         echo $k;       
        ?>
        </h4>
        <span class="price">
            <?=$product['cena_brutto']?>zł
        </span>
        <span class="netto">
            netto:
        <?=$product['cena_netto']?>zł(VAT:<?=$product['procent_vat']?>%)
        </span>    
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['ilosc']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
       
    </div>
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