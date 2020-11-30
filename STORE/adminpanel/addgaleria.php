<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dodaj produkt</title>
        <link rel="icon" href="img/flexstore.png" type="image/icon type">
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
<?php require "connect.php";
session_start();
if (isset($_SESSION['rodzaj'])){
    if ($_SESSION['rodzaj']=='Pracownik'){
        header("location: /index-pracownik.php");
    }
    }
    else{
        header("location: /logowaniecms.php");
    }
?>
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
             <head>
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
                                    <div class="card-body bg-login">
                                    <form action="dodgaleria.php" method="POST" class="dod">
                                    <label>Produkt</label>
                                      <select id="id_produkt" name="id_produkt" class="form-control">
                                      <?php

                                        $query='SELECT id_produkt, nazwa from produkt';
                                        $st=$pdo->query($query);
                                            if($st == true){
                                                while($row=$st->fetch()){
                                                   ?> <option value=<?php echo $row["id_produkt"] ?>><?php echo "<td>".$row["nazwa"]."</td>"; ?></option><?php
                                                } 
                                            }

                                    
                                    ?>
                                    </select>
                                      <label>Nazwa zdjęcia</label>
                                      <input type="text" name="nazwa" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="dod" >
                                       <input type="submit" class="btn btn-primary" value="Zapisz">
                                    </div>
                                     </form>
                                    </div>
    </body>
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
