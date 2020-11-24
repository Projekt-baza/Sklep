<?php
$sql8 = $pdo->prepare("SELECT * FROM adres where id_adres = :em");
$sql8->bindParam(":em", $_SESSION['idadres'], PDO::PARAM_STR);
$sql8->execute();
$adres = $sql8->fetch(PDO::FETCH_ASSOC);
$_SESSION['idadres']=$adres['id_adres'];

if (isset($_POST['id_produkt'], $_POST['ilosc']) && is_numeric($_POST['id_produkt']) && is_numeric($_POST['ilosc'])) {
    $product_id = (int)$_POST['id_produkt'];
    $quantity = (int)$_POST['ilosc'];
    $stmt = $pdo->prepare('SELECT * FROM produkt WHERE id_produkt = ?');
    $stmt->execute([$_POST['id_produkt']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    
    

    if ($product && $quantity > 0) {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    header('location: index.php?page=cart');
    exit;
    
}
    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
        unset($_SESSION['cart'][$_GET['remove']]);
    }

    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
            foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
     
        header('location: index.php?page=cart');
        exit;
    }

    if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        header('Location: index.php?page=zamow');
        exit;
    }
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();
    $subtotal = 0.00;
  
    if ($products_in_cart) {
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $pdo->prepare('SELECT * FROM produkt WHERE id_produkt IN (' . $array_to_question_marks . ')');
        $stmt->execute(array_keys($products_in_cart));
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($products as $product) {
            $subtotal += (float)$product['cena_brutto'] * (int)$products_in_cart[$product['id_produkt']];
            $idp=$product['id_produkt'];
            $il=$products_in_cart[$product['id_produkt']];
        }
    }
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    $_SESSION['items']=$num_items_in_cart;

?>
<html>
<head>
<title>Koszyk</title>
<meta charset="utf-8">
<link href="css/styles.css" rel="stylesheet" />
<link href="css/style1.css" rel="stylesheet" />
</head>
<body>
<h1>Koszyk</h1>
<div class="koszyk">
    <form action="index.php?page=cart" method="post">

        <table class="styled-table">
            <thead>
                <tr>
                    <td colspan="2">Produkt</td>
                    <td>Cena</td>
                    <td>Ilość</td>
                    <td>Razem</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Nie dodałeś żadnego produktu do koszyka</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id_produkt=<?=$product['id_produkt']?>">
                            <img src="img/<?=$product['zdj']?>" width="50" height="50" alt="<?=$product['nazwa']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&id_produkt=<?=$product['id_produkt']?>"><?=$product['nazwa']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['id_produkt']?>" class="remove">Usuń</a>
                    </td>
                    <td class="price"><?=$product['cena_brutto']?>zł</br>
                    <span class="netto">
                    netto:
                    <?=$product['cena_netto']?>zł(VAT:<?=$product['procent_vat']?>%)
                    </span>
                    </td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id_produkt']?>" value="<?=$products_in_cart[$product['id_produkt']]?>" min="1" max="<?=$product['ilosc']-$_SESSION['ilosc']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price"><?=$product['cena_brutto'] * $products_in_cart[$product['id_produkt']]?>zł</br>
                    <span class="netto">
                    netto:
                    <?=$product['cena_netto']* $products_in_cart[$product['id_produkt']]?>zł
                    </span>
                
                </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">W sumie</span>
            <span class="price"><?=$subtotal?>zł</span>
        </div>
        <div class="buttons">
            <input type="submit" value="Aktualizuj" class="btn btn-secondary" name="update">
            <input type="submit" value="Złóż zamówienie" class="btn btn-secondary" name="placeorder">
        </div>
    </form>
    <a href="index.php?page=home"><button class="btn btn-secondary">Wróć</button></a>
    <h2>Twój Adres</h2>

    <table class="styled-table">
            <thead>
                <tr>
                    <td>Miejscowość</td>
                    <td>Województwo</td>
                    <td>Ulica</td>
                    <td>nr domu</td>
                    <td>nr mieszkania</td>
                    <td>Poczta</td>
                    <td>Kod pocztowy</td>
                </tr>
            </thead>
            <?php if (empty($adres)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Nie masz adresu lub jesteś nie zalogowany, po kliknięciu "Złóż zamówienie" zostanie dodany twój adres </td>
                </tr>
                <?php else: ?>
            <tbody>
              <tr>
              <td><?php echo $adres['miejscowosc']?></td>
              <td><?php echo $adres['wojewodztwo']?></td>
              <td><?php echo $adres['ulica']?></td>
              <td><?php echo $adres['nr_domu']?></td>
              <td><?php echo $adres['nr_mieszkania']?></td>
              <td><?php echo $adres['miasto']?></td>
              <td><?php echo $adres['kod_pocztowy']?></td>
              </tr>
              <?php endif; ?>
            </tbody>
            </table>
            
</div>

</body>
</html>
