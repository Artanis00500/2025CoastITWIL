<?php 
include 'db.php'; 

// Get the product ID from the URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the product from the database
$productQuery = $conn->query("SELECT * FROM products WHERE id=$id");

if ($productQuery && $productQuery->num_rows > 0) {
    $product = $productQuery->fetch_assoc();
} else {
    echo "<p>Product not found.</p>";
    exit();
}
?>

<h2><?= htmlspecialchars($product['name']) ?></h2>
<p><?= htmlspecialchars($product['description']) ?></p>
<p>R<?= number_format($product['price'], 2) ?></p>

<a href="addtocart.php?id=<?= $product['id'] ?>">Add to Cart</a>
