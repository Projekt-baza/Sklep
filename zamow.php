<?php
include "cart.php";
$table=" ";
if(isset($_SESSION['id']) && isset($_SESSION['idadres'])){
$id_k = $_SESSION['id'];
$stmt1 = $pdo->prepare("INSERT INTO zamowienia (id_zamowienia, id_klient, przyjeto, data_przyjecia) VALUES (null, :idk, null, null)");
$stmt1->bindValue(':idk', $id_k , PDO::PARAM_STR);
$stmt1->execute();


$stt = $pdo->prepare("SELECT id_zamowienia FROM zamowienia ORDER BY id_zamowienia DESC limit 1");
$stt->execute();
$idz= $stt->fetch(PDO::FETCH_ASSOC);

$st=$pdo->prepare("INSERT INTO zamowienia_produkty (id_zamowienia_produkty, id_zamowienia, id_produkt, cena_netto, cena_brutto, ilosc) VALUES (null, :idz, :idp, :cn, :cb, :il)");
$st->bindValue(':idz', $idz["id_zamowienia"] , PDO::PARAM_STR);
$array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
$stmt = $pdo->prepare('SELECT * FROM produkt WHERE id_produkt IN (' . $array_to_question_marks . ')');
$stmt->execute(array_keys($products_in_cart));
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($products as $product) {
    $st->bindValue(':idp', $product["id_produkt"] , PDO::PARAM_STR);
    $st->bindValue(':cb', $product['cena_brutto'] * $products_in_cart[$product['id_produkt']] , PDO::PARAM_STR);
    $st->bindValue(':il', $products_in_cart[$product['id_produkt']] , PDO::PARAM_STR);
    $st->bindValue(':cn', $product['cena_netto']* $products_in_cart[$product['id_produkt']], PDO::PARAM_STR);
    $st->execute();
    $subtotal += $product['cena_brutto'] * $products_in_cart[$product['id_produkt']];
    $table .='
   Nazwa: '.$product["nazwa"].'
   Cena: '.$product['cena_brutto'].'
   Ilosc: '.$products_in_cart[$product['id_produkt']].'
   Razem:  '.$product['cena_brutto'] * $products_in_cart[$product['id_produkt']].'zł'
   
   
   ;
}
echo $table;


$to = $_SESSION['username']; 
$subject = 'Zamówienie'; 
$message = '
Dziękujemy, że wybrałeś nasz sklep!
Poniżej znajdują się informacje o twoim zamówieniu

'.$table.'




'; 
             
$headers = 'From:noreply@yourwebsite.com' . "\r\n"; 
mail($to, $subject, $message, $headers); 


echo '<script type="text/javascript">'; 
echo 'alert("Twoje zamówienie zostało zaksięgowane");'; 
echo 'window.location.href = "index.php?page=home";';
echo '</script>';
unset($_SESSION['cart']);
unset($_SESSION['ilosc']);

}
else if(isset($_SESSION['id']) && !isset($_SESSION['idadres'])){
    header("location: dodadres.php");
}

else{
    header("location: logowanie.php");
}

?>