<?php
// Include database connection and start session
require_once 'db.php';

// If an ID is passed via GET, add it to the cart
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sanitize input
    $_SESSION['cart'][] = $id;

    // Redirect to the same page to prevent resubmission
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
</head>
<body>

<h2>Your Cart</h2>

<?php
if (!empty($_SESSION['cart'])) {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $id) {
        $product_result = $conn->query("SELECT * FROM products WHERE id=$id");

        if ($product_result && $product = $product_result->fetch_assoc()) {
            echo "<li>{$product['name']} - R{$product['price']}</li>";
        } else {
            echo "<li>Product not found (ID: $id)</li>";
        }
    }
    echo "</ul>";
} else {
    echo "<p>Your cart is empty. Why not go back and add something to it?</p>";
}
?>

<p><a href="index.html">Back to Products</a></p>

</body>
</html>
