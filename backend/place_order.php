<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'consumer') {
    header("Location: login.php");
    exit;
}

if (!isset($_POST['product_id'], $_POST['quantity'], $_POST['delivery_date'])) {
    die("Error: Missing order details.");
}

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$delivery_date = $_POST['delivery_date'];
$consumer_id = $_SESSION['user_id'];

$sql = "SELECT stock, price FROM products WHERE product_id = '$product_id'";
$result = $conn->query($sql);

if ($result && $result->num_rows == 1) {
    $product = $result->fetch_assoc();
    $stock = $product['stock'];
    $price = $product['price'];

    if ($quantity > $stock) {
        echo "Error: Insufficient stock available.";
    } else {
        $total_price = $quantity * $price;

        $new_stock = $stock - $quantity;
        $update_stock_sql = "UPDATE products SET stock = '$new_stock' WHERE product_id = '$product_id'";
        $conn->query($update_stock_sql);

        $place_order_sql = "INSERT INTO orders (product_id, consumer_id, quantity, total_price, delivery_date) 
                            VALUES ('$product_id', '$consumer_id', '$quantity', '$total_price', '$delivery_date')";
        if ($conn->query($place_order_sql) === TRUE) {
            echo "Order placed successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "Error: Product not found.";
}

$conn->close();
?>
