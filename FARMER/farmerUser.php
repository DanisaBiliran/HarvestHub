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
    <link rel="stylesheet" href="../CSS/Farmer/farmerUser.css">

    <title>Farmer</title>
    <style>
        .hidden {
            display: none;
        }

        /* Style for active navigation links */
        #navigation .nav-link.active {
            text-decoration: underline; /* Underline for active nav link */
            font-weight: bold; /* Optional: make it bold */
        }

        
        /* ENSURE FOOTER IS AT THE BOTTOM OF PAGE */
        html, body {
                    height: 100%;
                    margin: 0;
                }

                body {
                    position: relative;
                }

                #footer {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                }
    </style>
</head>
<body>
    <div id="header"></div>

    <!-- PROFILE PICTURE -->
    <div id="profilePicContainer">
        <img src="../pictures/sustain-communities.jpg" alt="profile picture">
    </div>

    <!-- USERNAME -->
    <h1>Username</h1>

    <!-- Rating -->
    <div id="ratingStars">
        <!-- Each star is a button -->
        <button class="star" data-value="1">★</button>
        <button class="star" data-value="2">★</button>
        <button class="star" data-value="3">★</button>
        <button class="star" data-value="4">★</button>
        <button class="star" data-value="5">★</button>
    </div>

    <!-- Display selected rating -->
    <div id="selectedRating"></div>
    
    <br><br>

    <div id="buttonContainer">
        <button id="edit-button"><img src="../icons/editWhite.png" alt="edit"></button>
        <a id="chat-button" href="../BOTH/chat.html"><img src="../icons/message.png" alt="chats"></a>
        <a href="../logout.php"> <button id="logout-button">Logout</button> </a>
    </div>

    <div id="navigation">
        <h2><a href="#" class="nav-link active" data-target='general-info'>General Information</a></h2>
        <h2><a href="#" class="nav-link" data-target='ratings'>Ratings</a></h2>
        <h2><a href="#" class="nav-link" data-target='products-selling'>Products Selling</a></h2>
        <h2><a href="#" class="nav-link" data-target='orders'>Orders</a></h2>
        <h2><a href="#" class="nav-link" data-target='sales'>Sales</a></h2>
    </div>

    <div id="info-container">
        <!-- GENERAL INFORMATION -->
        <div id="general-info">
            <p>Address: </p> <!-- street, barangay, city -->
            <p>Email: </p>
            <p>Phone: </p>
        </div>

        <!-- RATINGS -->
        <div id="ratings" class="hidden">
            <p>Ratings: </p> <!-- average number of stars -->
            <br>
            <div id="each-rating">
                <div id="profile-pic-container">
                    <img src="../pictures/farmer3.jpg" alt="user profile picture">
                </div>

                <div id="words">
                    <p>Username: </p>
                    <p>Rated: </p>
                    <p>Commented: </p>
                </div>
            </div>
        </div>

        <!-- PRODUCTS SELLING -->
        <div id="products-selling" class="hidden">
            <table id="products-selling-table">
                <tr>
                    <td class="add-button" colspan="3" style="border: none;">
                        <a href="../FARMER/add-product-selling.html"><button>+</button></a>
                    </td>
                </tr>
                <tr>
                    <td id="item-pic-cell">
                        <img src="../pictures/egg.png" alt="item">
                    </td>

                    <td id="item-short-description">
                        <p><b>Product: </b> Eggs </p>
                        <p><b>Price: </b> 5.00 per piece</p>
                        <p><b>Stocks: </b> 100 pieces left</p>
                    </td>

                    <td id="actions">
                        <a href="view-product-selling.html"><button class="view-button">view</button></a>
                        <a href="updateProductSelling.html"><button class="update-button">update</button></a>
                        <a href=""><button class="delete-button">delete</button></a>
                    </td>
                </tr>
            </table>
        </div>

        <!-- ORDERS -->
        <div id="orders" class="hidden">
            <table id="orders-table">
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Cust. Barangay</th>
                    <th>Cost (products)</th>
                    <th>Selling Type</th>
                    <th>Actions</th>
                </tr>

                <!-- examples -->
                <tr>
                    <td>12345</td> <!-- Order ID -->
                    <td>1/1/2024</td> <!-- Date -->
                    <td>Juan Cruz</td> <!-- Customer -->
                    <td>Recodo</td> <!-- Cust. Barangay -->
                    <td>100.00</td> <!-- Cost (products) -->
                    <td>Pickup</td> <!-- Selling Type -->

                    <!-- Actions -->
                    <td id="action-cell">
                        <a href="../FARMER/ordersView.html"><button class="view-button">view</button></a>
                        <button class="update-button">accept</button>
                        <button class="delete-button">deny</button>
                    </td>
                </tr>
            </table>
        </div>

        <!-- SALES -->
        <div id="sales" class="hidden">
            <table id="sales-table">
                <tr>
                    <th>Order ID</th>
                    <th>Date Sold</th>
                    <th>Customer</th>
                    <th>Selling Type</th>
                    <th>Total Cost</th>
                    <th>Actions</th>
                </tr>

                <!-- examples -->
                <tr>
                    <td>12345</td> <!-- Order ID -->
                    <td>1/1/2024</td> <!-- Date Sold -->
                    <td>Username</td> <!-- Customer -->
                    <td>Delivery</td> <!-- Selling Type -->
                    <td>120.00</td> <!-- Total Cost -->

                    <!-- Actions -->
                    <td id="action-cell">
                        <button class="view-button">view</button>
                    </td>
                </tr>
            </table>
        </div>

    </div>

    <br><br><br><br><br><br>
    <!-- Footer Placeholder -->
    <div id="footer"></div>

    <!-- JS FOR LOADING HEADER AND FOOTER -->
    <script src="../JS/Farmer/farmerHeaderFooter.js"></script>

    <!-- JS FOR RATING A FARMER -->
    <script src="../JS/Farmer/ratingFarmer.js"></script>

    <!-- JavaScript for Navigation Functionality -->
    <script type='text/javascript'>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default anchor behavior

                // Hide all sections
                document.querySelectorAll('#info-container > div').forEach(section => {
                    section.classList.add('hidden');
                }); 

                // Show the selected section
                const targetId = this.getAttribute('data-target');
                document.getElementById(targetId).classList.remove('hidden');

                // Remove 'active' class from all links and add it to the clicked link
                document.querySelectorAll('.nav-link').forEach(nav => {
                    nav.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        // Trigger click on the first nav link to show its content by default
        document.querySelector('.nav-link.active').click();
    </script>

</body>
</html>