<?php
session_start(); // Force-start the session

// Include the database connection file
require_once 'db.php';

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $itemId = intval($_GET['id']); // converts input to INTeger

    // Initialize the cart if it doesn't exist already
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the item to the cart
    $_SESSION['cart'][] = $itemId;
}

// Redirect the user to the cart page
header("Location: cart.php");
exit;
?>
