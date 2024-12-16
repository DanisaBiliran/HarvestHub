<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'farmer') {
    header("Location: login.php");
    exit;
}

$product_id = $_GET['product_id'];

$sql = "DELETE FROM products WHERE product_id = '$product_id'";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully.";
} else {
    echo "Error: " . $conn->error;
}

header("Location: farmer_dashboard.php");
exit;
?>
