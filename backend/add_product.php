<?php
session_start();
include 'db_connect.php';

if ($_SESSION['role'] !== 'farmer') {
    header("Location: login.php");
    exit;
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $farmer_id = $_SESSION['user_id'];

    $sql = "INSERT INTO products (farmer_id, name, description, price, stock) VALUES ('$farmer_id', '$name', '$description', '$price', '$stock')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Product added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #abd1c6;
            color: #fffffe;
        }
        .navbar, .card {
            background-color: #004643 !important;
        }
        .navbar-brand, .nav-link, .card-title, .form-label, .btn {
            color: #fffffe !important;
        }
        .btn-primary {
            background-color: #004643;
            border-color: #004643;
        }
        .btn-primary:hover {
            background-color: #032f2a;
            border-color: #032f2a;
        }
        .form-control {
            background-color: #fffffe;
            color: #000;
        }
        a {
            color: #004643;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #004643;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="index.php">HarvestHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="farmer_dashboard.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="add_product.php">Add New Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="farmer_orders.php">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <h3 class="card-title text-center mb-4">Add Product</h3>

                <!-- Success/Error Message -->
                <?php if ($message): ?>
                    <div class="alert alert-info text-center">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter product name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter product description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" class="form-control" step="0.01" name="price" id="price" placeholder="Enter price" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock:</label>
                        <input type="number" class="form-control" name="stock" id="stock" placeholder="Enter stock quantity" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Product</button>
                </form>

                <div class="text-center mt-3">
                    <a href="farmer_dashboard.php" class="text-decoration-none">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
