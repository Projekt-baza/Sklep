<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dodaj pracownika</title>
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
            

            <!-- Navbar top-->

            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-alt"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logowanie.php">Wyloguj się</a>
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


                   <a class="nav-link collapsed" href="#">
                       <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>Zamówienia
                   </a>

                   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                       <div class="sb-nav-link-icon"><i class="fas fa-tshirt"></i></div>Produkty
                       <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                   </a>
                   <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                         <a class="nav-link collapsed" href="adminpanel/addproduct.php" >
                               <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                         </a>
                         <a class="nav-link collapsed" href="adminpanel/minusproduct.php">
                               <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                         </a>
                         <a class="nav-link collapsed" href="adminpanel/editproduct.php">
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
                         <a class="nav-link collapsed" href="adminpanel/addemployee.php" >
                               <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>Dodaj
                         </a>
                         <a class="nav-link collapsed" href="adminpanel/minusemployee.php">
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
                         <a class="nav-link collapsed" href="adminpanel/adduser.php">
                               <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>Dodaj
                         </a>
                         <a class="nav-link collapsed" href="adminpanel/minususer.php">
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
                                 <a class="nav-link collapsed" href="adminpanel/addaddress.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="adminpanel/minusaddress.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                                 </a>
                                 <a class="nav-link collapsed" href="adminpanel/editaddress.php">
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
                                 <a class="nav-link collapsed" href="adminpanel/addkategoria.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="adminpanel/minuskategoria.php">
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
                                 <a class="nav-link collapsed" href="adminpanel/addproducent.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="adminpanel/minusproducent.php">
                                       <div class="sb-nav-link-icon"><i class="fas fa-minus-circle"></i></div> Usuń
                                 </a>
                                 <a class="nav-link collapsed" href="adminpanel/editproducent.php">
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
                                 <a class="nav-link collapsed" href="adminpanel/addgaleria.php" >
                                       <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div> Dodaj
                                 </a>
                                 <a class="nav-link collapsed" href="adminpanel/minusgaleria.php">
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
                        <?php echo $_SESSION['rodzaj'];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">



              <main>

             <!-- ZAWARTOSC----------------------------------------------------------------------------------------------------->
             <br><button><a class="btn btn-primary" href="index-pracownik.php" >Wroc</a></button></br>
             <?php
        require "connect.php";
        if(isset($_POST['execute'])) {
            $id_zamowienia_produkty=$_POST['execute'];
            $query='SELECT id_zamowienia_produkty,id_zamowienia, id_klient, data_zamowienia, id_produkt, cena_netto, cena_brutto,potwierdz, ilosc from zamowienia INNER JOIN zamowienia_produkty USING (id_zamowienia) WHERE przyjeto IS NULL and id_zamowienia_produkty = '.$id_zamowienia_produkty.'';
            $st=$pdo->query($query);
            $row=$st->fetch();
            $id_zamowienia=$row['id_zamowienia'];
            $id_klient=$row['id_klient'];
            $data_zamowienia=$row['data_zamowienia'];
            $id_produkt=$row['id_produkt'];
            $cena_netto=$row['cena_netto'];
            $cena_brutto=$row['cena_brutto'];
            $ilosc=$row['ilosc'];

        
           

?>
        <form action="zatwierdz.php" method="post">
            <input type="hidden" name="id_zamowienia_produkty" value="<?php echo $id_zamowienia_produkty; ?>">
            <input type="hidden" name="id_zamowienia" value="<?php echo $id_zamowienia; ?>">
            <input type="hidden" name="date" value="<?php echo $date; ?>">
            id_klient: <input type="text" name="id_klient" value="<?php echo $id_klient; ?>" class="form-control"><br>
            data_zamowienia: <input type="text" name="data_zamowienia" value="<?php echo $data_zamowienia; ?>" class="form-control"><br>
            id_produkt: <input type="text" name="id_produkt" value="<?php echo $id_produkt; ?>" class="form-control"><br>
            Cena_netto: <input type="number" name="cena_netto" value="<?php echo $cena_netto; ?>" class="form-control"><br>
            cena_brutto: <input type="number" name="cena_brutto" value="<?php echo $cena_brutto; ?>" class="form-control"><br>
            ilosc: <input type="number" name="ilosc" value="<?php echo $ilosc; ?>" class="form-control"><br>
            <?php 
              if($row['potwierdz']!=1){
               echo "<input type='Submit' value='Aktualizuj' class='btn btn-primary'>";
              }
            ?>
            
        </form>
<?php
}
    if(isset($_POST["id_zamowienia_produkty"])){
        $query='UPDATE zamowienia_produkty SET potwierdz = "1" WHERE id_zamowienia_produkty="'.$_POST["id_zamowienia_produkty"].'" and id_produkt="'.$_POST["id_produkt"].'" and id_zamowienia="'.$_POST["id_zamowienia"].'"';
        $st=$pdo->query($query);
        
        $query='SELECT ilosc from produkt WHERE id_produkt='.$_POST["id_produkt"];
        $st=$pdo->query($query);
        $row=$st->fetch();
        $ilosc2=$row['ilosc'];
        ?>
        <input type="hidden" name="ilosc2" value="<?php echo $ilosc2; ?>">
        <?php
        $query='UPDATE produkt SET ilosc = '.$ilosc2.' - "'.$_POST["ilosc"].'"  WHERE id_produkt='.$_POST["id_produkt"];
        $st=$pdo->query($query);

        $sql =$pdo->prepare('SELECT id_zamowienia from zamowienia where id_zamowienia=any(SELECT id_zamowienia FROM zamowienia_produkty where potwierdz=0 and id_zamowienia="'.$_POST["id_zamowienia"].'")');
        $sql->execute();
        $count = $sql->rowCount();
        if($count<1){
            $sql2='UPDATE zamowienia set przyjeto="1" WHERE id_zamowienia='.$_POST["id_zamowienia"];
            $stmt=$pdo->query($sql2);
        }
        
            
        

    }
    
?>
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