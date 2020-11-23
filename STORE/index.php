<?php
session_start();
require "connect.php";
$stmt = $pdo->prepare('SELECT * FROM produkt LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>FLEXYstore</title>
        <link rel="icon" href="img/flexstore.png" type="image/icon type">

        <link href="css/styles.css" rel="stylesheet" />
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
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Szukaj..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

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

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-mars"></i></div>
                                Dla mężczyzn
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                      Podstrona1
                                      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                  </a>
                                  <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                      <nav class="sb-sidenav-menu-nested nav">
                                          <a class="nav-link" href="#">Lista1</a>
                                          <a class="nav-link" href="#">Lista2</a>
                                          <a class="nav-link" href="#">Lista3</a>
                                      </nav>
                                  </div>


                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                      Podstrona2
                                      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                  </a>
                                  <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                      <nav class="sb-sidenav-menu-nested nav">
                                          <a class="nav-link" href="#">Lista1</a>
                                          <a class="nav-link" href="#">Lista2</a>
                                          <a class="nav-link" href="#">Lista3</a>
                                      </nav>
                                  </div>
                              </nav>
                          </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-venus"></i></div>
                                Dla kobiet
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>


                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Podstrona1
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">Lista1</a>
                                            <a class="nav-link" href="#">Lista2</a>
                                            <a class="nav-link" href="#">Lista3</a>
                                        </nav>
                                    </div>


                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Podstrona2
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#">Lista1</a>
                                            <a class="nav-link" href="#">Lista2</a>
                                            <a class="nav-link" href="#">Lista3</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>



                            <div class="sb-sidenav-menu-heading">Informacje</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                                Pomoc
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"><a href="logowanie.php">Zaloguj się</a></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

              <!-- Zawartość-->
                <main>
            <img class="img-fluid" src="img/background.png">



         <div class="offerts">
            <div class="row">
         <?php foreach($recently_added_products as $product):?>
         <div class="col-xl-3 col-md-6">
         <div class="card bg-card mb-4">
         <a href="index-user.php?page=product&id=<?=$product['id_produkt']?>" class="product">
          <img class="card-img" src="img/<?=$product['zdj']?>" alt="<?=$product['nazwa']?>">
          </a>
        <div class="card-footer card-topname d-flex align-items-center justify-content-between">
        <?=$product['nazwa']?>
        <div class="small text-cyan"><?=$product['cena_brutto']?> zł</div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
        <?php
         $stmt2 = $pdo->prepare('SELECT nazwa as kategoria from kategoria where id_kategoria = (Select id_kategoria from produkt where id_produkt = :kat )');
         $stmt2->bindValue(':kat', $product['id_produkt'] , PDO::PARAM_STR);
         $stmt2->execute();
         while ($kategoria = $stmt2->fetch(PDO::FETCH_ASSOC)){
             $k=$kategoria['kategoria'];
         }
         echo $k;       
        ?>
        </div>
    
        </div>
           </div>
           <?php endforeach; ?>
              </div>
                </main>

              <!--Footer-->
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Jastrzębska Hepner Gastołek 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
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
