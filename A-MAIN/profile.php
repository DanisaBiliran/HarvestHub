<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);
if ($result->num_rows === 0) {
    die("User not found.");
}
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
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
            <a class="navbar-brand fw-bold" href="">HarvestHub</a>
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
                            <a class="nav-link active" href="profile.php?user_id=<?php echo $_SESSION['user_id']; ?>">Profile</a>
                        </li>
                        <?php if ($_SESSION['role'] === 'farmer'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="farmer_dashboard.php">Dashboard</a>
                        </li>
                        <?php endif; ?>
                        <?php if ($_SESSION['role'] === 'farmer'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="add_product.php">Add New Product</a>
                        </li>
                        <?php endif; ?>
                        <?php if ($_SESSION['role'] === 'farmer'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="farmer_orders.php">Orders</a>
                        </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] === 'consumer'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Browse Products</a>                        </li>
                        <?php endif; ?>
                        <?php if ($_SESSION['role'] === 'consumer'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="consumer_orders.php">Your Orders</a>
                        </li>
                        <?php endif; ?>
                        <?php if ($_SESSION['role'] === 'consumer'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="search_farmers.php">Search Farmers</a>
                        </li>
                        <?php endif; ?>

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
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <h2 class="text-center mb-4 fw-bold">My Profile</h2>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
                    <p><strong>Role:</strong> <?php echo ucfirst(htmlspecialchars($user['role'])); ?></p>

                    <div class="text-center mt-3">
                        <a href="update_profile.php" class="btn btn-back px-4 py-2">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
