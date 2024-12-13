<?php

session_start();

// Debugging
// echo "Session Debug: <br>";
// echo "First Name: " . $_SESSION['firstName'] . "<br>";
// echo "Roles: " . $_SESSION['Roles'] . "<br>";  
// echo "Id: " . $_SESSION['Id'] . "<br>";  
// exit; 

if (!isset($_SESSION['Id']) || $_SESSION['Roles'] != 'farmer') {
    header("Location: farmerLogin.php");
    exit;
}
include 'C:\xampp\htdocs\HarvestHub\db_connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Farmer/farmerHeader.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/shop.css">
    <title>Shop</title>
</head>
<body>
    <div id="header"></div>
    <div id="img-with-text">
        <img src="../pictures/Rectangle 4140.png" alt="">
        <div id="texts">
            <h1>Connecting Farmers and Consumers</h1>
            <p>Shop fresh produce directly from local farmers.</p>
        </div>
    </div>
    <br><br>

    <!-- SEARCH FIELD -->
    <div id="search-container">
        <input type="text">
        <button>Search</button>
    </div>

    <div id="product-category">
        <h3>Products</h3>
        <select id="category" name="category" required>
            <option value="fresh-produce">Fresh Produce</option>
            <option value="dairy-products">Dairy Products</option>
            <option value="meat-and-poultry">Meat and Poultry</option>
            <option value="grains-and-legumes">Grains and Legumes</option>
        </select>
    </div>

    <div id="product-container">
        <!-- each product -->
        <div onclick="location.href='productInfo.html';" style="cursor: pointer;">
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>

        <div>
            <img src="../pictures/egg.png" alt="product">
            <b>Product Name</b>
            <p>Price: ₱ 5.00</p>
        </div>
    </div>
    <br><br><br><br><br><br>

    <div id="footer"></div>
    <!-- JS FOR LOADING HEADER AND FOOTER -->
    <script src="../JS/Farmer/farmerHeaderFooter.js"></script>
</body>
</html>