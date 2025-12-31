<?php
$servername = "localhost";
$username = "root"; // XAMPP username
$password = "";     // XAMPP password
$dbname = "shopsmart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
