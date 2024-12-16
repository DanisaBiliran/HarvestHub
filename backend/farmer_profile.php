<?php
session_start();
include 'db_connect.php';

if ($_SESSION['role'] !== 'consumer') {
    header("Location: login.php");
    exit;
}

// Get farmer ID from query parameter
if (!isset($_GET['farmer_id']) || empty($_GET['farmer_id'])) {
    die("Farmer not specified.");
}

$farmer_id = intval($_GET['farmer_id']);

// Fetch farmer details
$sql_farmer = "SELECT * FROM users WHERE user_id = $farmer_id AND role = 'farmer'";
$result_farmer = $conn->query($sql_farmer);
if ($result_farmer->num_rows === 0) {
    die("Farmer not found.");
}
$farmer = $result_farmer->fetch_assoc();

// Fetch farmer's products
$sql_products = "SELECT * FROM products WHERE farmer_id = $farmer_id";
$result_products = $conn->query($sql_products);

// Calculate average rating
$sql_rating = "SELECT AVG(rating) AS avg_rating FROM ratings WHERE user_id = $farmer_id"; 
$result_rating = $conn->query($sql_rating);
$avg_rating = ($result_rating->num_rows > 0) ? $result_rating->fetch_assoc()['avg_rating'] : 'No ratings yet';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body { background-color: #abd1c6; }
        .card { background-color: #004643; color: #fffffe; border: none; }
        .table { color: #fffffe; }
        .table thead th { background-color: #004643; color: #fffffe; }
        a { color: #fffffe; }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="mynavbar navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #004643;">
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
                        <a class="nav-link" href="consumer_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search_farmers.php">Search Farmers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-5 pt-5">
    <!-- Farmer Info -->
    <div class="card mb-4 p-4 shadow">
        <h2 class="fw-bold text-center"><?php echo htmlspecialchars($farmer['name']); ?></h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($farmer['email']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($farmer['address']); ?></p>
        <p><strong>Average Rating:</strong> 
            <?php echo is_numeric($avg_rating) ? number_format($avg_rating, 2) . " / 5" : $avg_rating; ?>
        </p>
    </div>

    <!-- Farmer's Products -->
    <div class="card p-4 shadow">
        <h3 class="fw-bold mb-3">Products</h3>
        <?php if ($result_products->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($product = $result_products->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo htmlspecialchars($product['description']); ?></td>
                        <td>₱<?php echo number_format($product['price'], 2); ?></td>
                        <td><?php echo htmlspecialchars($product['stock']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="text-center">No products listed by this farmer.</p>
        <?php endif; ?>
    </div>

    <div class="mt-4 text-center">
        <a href="search_farmers.php" class="btn btn-dark">Back to Search</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
