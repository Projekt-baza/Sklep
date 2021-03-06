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
    <?php
require "connect.php";
session_start();
if (isset($_SESSION['rodzaj'])){
if ($_SESSION['rodzaj']=='Admin'){
    header("location: /index-admin.php");
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
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-alt"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                     
                        <a class="dropdown-item" href="logoutcms.php">Wyloguj się</a>
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

                   <div class="sb-sidenav-menu-heading">Administracja</div>


                   <a class="nav-link collapsed" href="#">
                       <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>Zamówienia
                   </a>

                   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                       <div class="sb-nav-link-icon"><i class="fas fa-tshirt"></i></div>Produkty
                       <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                   </a>
                   <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                         <a class="nav-link collapsed" href="pracownikpanel/addproduct.php" >
                               <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                         </a>
                         <a class="nav-link collapsed" href="pracownikpanel/minusproduct.php">
                               <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                         </a>
                         <a class="nav-link collapsed" href="pracownikpanel/editproduct.php">
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
                                 <a class="nav-link collapsed" href="pracownikpanel/addkategoria.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="pracownikpanel/minuskategoria.php">
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
                                 <a class="nav-link collapsed" href="pracownikpanel/addproducent.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="pracownikpanel/minusproducent.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                                 </a>
                                 <a class="nav-link collapsed" href="pracownikpanel/editproducent.php">
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
                                 <a class="nav-link collapsed" href="pracownikpanel/addgaleria.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="pracownikpanel/minusgaleria.php">
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
                        <?php echo $_SESSION['rodzaj']?>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
            <main>

<!-- ZAWARTOSC----------------------------------------------------------------------------------------------------->
<table>
<tr>
<td>id_zamowienia_produkty </td>
<td>Id_zamowienia </td>
<td>Id_klienta </td>
<td>Data_zamowienia </td>
<td>Id_produkt </td>
<td>Cena_netto </td>
<td>Cena_brutto </td>
<td>Ilosc </td>
<td></td>
<?php
$query='SELECT id_zamowienia, id_zamowienia_produkty, id_klient, data_zamowienia, id_produkt, cena_netto, cena_brutto, ilosc from zamowienia INNER JOIN zamowienia_produkty USING (id_zamowienia) WHERE przyjeto IS NULL';
$st=$pdo->query($query);
if($st == true){
while($row=$st->fetch()){
   echo "<tr>";
   echo "<td>".$row["id_zamowienia_produkty"]."</td>";
   echo "<td>".$row["id_zamowienia"]."</td>";
   echo "<td>".$row["id_klient"]."</td>";
   echo "<td>".$row["data_zamowienia"]."</td>";
   echo "<td>".$row["id_produkt"]."</td>";
   echo "<td>".$row["cena_netto"]."</td>";
   echo "<td>".$row["cena_brutto"]."</td>";
   echo "<td>".$row["ilosc"]."</td>";
   echo "<td>".'<form action="zatwierdz.php" method="post" class="form">
   <input type="hidden" name="execute" value="'. $row['id_zamowienia_produkty'] .'">
   <input type="submit" value="Szczegoly" class="btn btn-primary">
   </form>'."</td>";
   echo "</tr>";
} 
}



?>
</table>
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
