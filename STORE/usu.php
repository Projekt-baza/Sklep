<?php
if(isset($_GET['id_adres'])){
    echo $_GET['id_adres'];
    $s = $pdo->prepare("DELETE * FROM adres where id_adres = ?");
    $s->execute([$_GET['id_adres']]);
    header("location: dodadres.php");
}
?>