<?php
include 'header.php';
include 'db.php';

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_GET['add'])){
    $product_id = $_GET['add'];

    $result = $conn->query("SELECT * FROM products WHERE id=$product_id");
    $product = $result->fetch_assoc();

    $_SESSION['cart'][] = $product;
}

echo "<div class='container'>";
echo "<h2>Your Cart</h2>";

$total = 0;

foreach($_SESSION['cart'] as $item){
    echo "<p>".$item['name']." - R".$item['price']."</p>";
    $total += $item['price'];
}

echo "<p><strong>Total: R$total</strong></p>";

if($total > 0){
    echo "<a class='button' href='checkout.php'>Checkout</a>";
}

echo "</div>";
?>
