<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'consumer') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #abd1c6;
            color: #fffffe;
        }
        .navbar, .card {
            background-color: #004643 !important;
        }
        .navbar-brand, .nav-link, .card-title, .btn {
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
        a {
            color: #fffffe;
            text-decoration: none;
        }
        a:hover {
            color: #abd1c6;
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
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php?user_id=<?php echo $_SESSION['user_id']; ?>">Profile</a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="products.php">Browse Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="consumer_orders.php">Your Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="search_farmers.php">Search Farmers</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 text-center">
                <h2 class="card-title mb-4">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
                <p>This is your consumer dashboard.</p>

                <div class="d-grid gap-3 mt-4">
                    <a href="products.php" class="btn btn-primary">Browse Products</a>
                    <a href="consumer_orders.php" class="btn btn-primary">View Your Orders</a>
                    <a href="search_farmers.php" class="btn btn-primary">Search Farmers</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
