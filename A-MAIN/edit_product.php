<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'farmer') {
    header("Location: login.php");
    exit;
}

$product_id = $_GET['product_id'];
$message = "";

$sql = "SELECT * FROM products WHERE product_id = '$product_id'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $product = $result->fetch_assoc();
} else {
    die("Product not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "UPDATE products SET name = '$name', description = '$description', price = '$price', stock = '$stock' WHERE product_id = '$product_id'";

    if ($conn->query($sql) === TRUE) {
        $message = "Product updated successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $product['name']; ?>" required>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $product['description']; ?></textarea>
        
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" id="price" value="<?php echo $product['price']; ?>" required>
        
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="<?php echo $product['stock']; ?>" required>
        
        <button type="submit">Update Product</button>
    </form>
    <a href="farmer_dashboard.php">Back to Dashboard</a>
</body>
</html>
