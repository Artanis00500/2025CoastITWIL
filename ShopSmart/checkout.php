<?php
include 'header.php';
include 'db.php';

if(!isset($_SESSION['user_id'])){
    echo "<p>You must login first.</p>";
    exit();
}

if(empty($_SESSION['cart'])){
    echo "<p>Cart is empty.</p>";
    exit();
}

$user_id = $_SESSION['user_id'];

$conn->query("INSERT INTO orders (user_id) VALUES ($user_id)");

$_SESSION['cart'] = [];

echo "<div class='container'>";
echo "<h2>Order placed successfully!</h2>";
echo "</div>";
?>
