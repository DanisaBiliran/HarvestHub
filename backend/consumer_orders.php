<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'consumer') {
    header("Location: login.php");
    exit;
}

$consumer_id = $_SESSION['user_id'];

$sql = "SELECT o.order_id, o.quantity, o.total_price, o.delivery_date, 
               p.name AS product_name, u.name AS farmer_name 
        FROM orders o
        JOIN products p ON o.product_id = p.product_id
        JOIN users u ON p.farmer_id = u.user_id
        WHERE o.consumer_id = '$consumer_id'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #abd1c6;
            color: #fffffe;
        }
        .navbar, .card {
            background-color: #004643 !important;
        }
        .navbar-brand, .nav-link, .btn {
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
        table {
            background-color: #fffffe;
            color: #004643;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #dee2e6;
        }
        th {
            background-color: #004643;
            color: #fffffe;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg py-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="consumer_dashboard.php">HarvestHub</a>
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
                    <li class="nav-item"><a class="nav-link" href="products.php">Browse Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="consumer_orders.php">Your Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="search_farmers.php">Search Farmers</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card p-4">
                <h2 class="card-title text-center mb-4">Your Orders</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product</th>
                                <th>Farmer</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Delivery Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['farmer_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                <td>₱<?php echo number_format($row['total_price'], 2); ?></td>
                                <td><?php echo htmlspecialchars($row['delivery_date']); ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <a href="consumer_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
