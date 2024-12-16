<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to view this page.";
    header("Location: login.html");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>
<body class="mt-5 pt-2">

    <nav class="navbar bg-body-tertiary fixed-top py-3 px-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php">HarvestHub</a>
            <ul class="nav justify-content-end nav-underline">
            <li class="nav-item">
                <?php if ($_SESSION['role'] === 'consumer'): ?>
                <a class="nav-link" aria-current="page" href="">Products</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if ($_SESSION['role'] === 'consumer'): ?>
                <a class="nav-link" href="farmer_dashboard.php">Notifications</a>
                <?php endif; ?>
            </li>
            <li>
                <?php if ($_SESSION['role'] === 'farmer'): ?>
                <a class="nav-link" href="farmer_dashboard.php">My Products</a>
                <?php endif; ?>
                </li>
            </ul>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="farmer_dashboard.php">Profile</a>
                </li>
                <?php if ($_SESSION['role'] === 'farmer'): ?>
                <li>
                <a class="nav-link" href="add_product.php">Add new product</a>
                </li>
                <?php endif; ?>
                <li>
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </div>
          </div>
        </div>
    </nav>

    <!-- <div>
      h1
      <h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
      <p>User type: <?php echo $_SESSION['role']; ?></p>
      <a href="profile.php">Go to Profile</a><br>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
