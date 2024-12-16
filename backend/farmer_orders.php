<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'farmer') {
    header("Location: login.php");
    exit;
}

$farmer_id = $_SESSION['user_id'];

$sql = "SELECT o.order_id, o.consumer_id, o.quantity, o.total_price, o.delivery_date, 
               p.name AS product_name, u.name AS consumer_name 
        FROM orders o
        JOIN products p ON o.product_id = p.product_id
        JOIN users u ON o.consumer_id = u.user_id
        WHERE p.farmer_id = '$farmer_id'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body { background-color: #abd1c6; }
        .card { background-color: #004643; color: #fffffe; border: none; }
        .table { color: #fffffe; }
        .table thead th { background-color: #004643; color: #fffffe; }
        a { color: #fffffe; }
        a.btn-back { color: #fffffe; background-color: #004643; border: none; }
        a.btn-back:hover { background-color: #003333; color: #abd1c6; }
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
    <div class="card p-4 shadow">
        <h2 class="fw-bold text-center mb-4">Orders for Your Products</h2>
        <?php if ($result->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Consumer</th>
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
                        <td><?php echo htmlspecialchars($row['consumer_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td>₱<?php echo number_format($row['total_price'], 2); ?></td>
                        <td><?php echo htmlspecialchars($row['delivery_date']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="text-center">You currently have no orders for your products.</p>
        <?php endif; ?>
        <div class="text-center mt-4">
            <a href="farmer_dashboard.php" class="btn btn-back px-4 py-2">Back to Dashboard</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
