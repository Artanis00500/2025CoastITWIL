<?php 
include 'db.php'; 
?>

<h2>Products</h2>
<a href="cart.php">View Cart</a> | <a href="logout.php">Logout</a>

<?php
$result = $conn->query("SELECT * FROM products");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>
                <h3>" . htmlspecialchars($row['name']) . "</h3>
                <p>R" . number_format($row['price'], 2) . "</p>
                <a href='product.php?id=" . (int)$row['id'] . "'>View</a>
              </div>";
    }
} else {
    echo "<p>No products available at the moment.</p>";
}
?>
