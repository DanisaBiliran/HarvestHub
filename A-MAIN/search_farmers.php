<?php
session_start();
include 'db_connect.php';

if ($_SESSION['role'] !== 'consumer') {
    header("Location: login.php");
    exit;
}

// Initialize search parameters
$name = isset($_GET['name']) ? $_GET['name'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';

// Initialize an empty result variable
$result = null;

// Process search only if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET' && (isset($_GET['name']) || isset($_GET['address']))) {
    // Query to search farmers
    $sql = "SELECT * FROM users WHERE role = 'farmer'";
    if (!empty($name)) {
        $sql .= " AND name LIKE '%" . $conn->real_escape_string($name) . "%'";
    }
    if (!empty($address)) {
        $sql .= " AND address LIKE '%" . $conn->real_escape_string($address) . "%'";
    }
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Farmers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?user_id=<?php echo $_SESSION['user_id']; ?>">Profile</a>
                    </li>
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
        <div class="col-md-10">
            <div class="card p-4">
                <h2 class="card-title text-center mb-4" style="color: white;">Search Farmers</h2>
                <form method="GET" action="">
                    <div class="row mb-3" style="color: white;">
                        <div class="col-md-5">
                            <label for="name" class="form-label">Farmer Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>">
                        </div>
                        <div class="col-md-5">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" id="address" name="address" class="form-control" value="<?php echo htmlspecialchars($address); ?>">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
                    </div>
                </form>

                <?php if ($result): ?>
                    <h3 class="text-center mb-3">Search Results</h3>
                    <?php if ($result->num_rows > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td>
                                            <a href="farmer_profile.php?farmer_id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-primary">View Profile</a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-center">No farmers found matching your search criteria.</p>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="text-center mt-4">
                    <a href="consumer_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>