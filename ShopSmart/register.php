<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "Email already registered. Please <a href='login.html'>login</a>.";
    } else {
        $conn->query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
        header("Location: login.html");
        exit();
    }
} else {
    header("Location: register.html"); // redirect if accessed directly
    exit();
}
?>
