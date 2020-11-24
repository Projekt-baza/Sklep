<?php
include "cart.php";
$id_k = $_SESSION['id'];
$stmt1 = $pdo->prepare("INSERT INTO zamowienia (id_zamowienia, id_klient, data_zamowienia, przyjeto, data_przyjecia, zaplacono, data_wysylki, zrealizowano, data_realizacji) VALUES (null, :idk, CURRENT_DATE(), null, null, null, null, null, null)");
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
}
unset($_SESSION['cart']);
header("location: place.php");

?>