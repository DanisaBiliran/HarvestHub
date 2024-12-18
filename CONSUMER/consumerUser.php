<?php

session_start();

// Debugging
// echo "Session Debug: <br>";
// echo "First Name: " . $_SESSION['firstName'] . "<br>";
// echo "Roles: " . $_SESSION['Roles'] . "<br>";  
// echo "Id: " . $_SESSION['Id'] . "<br>";  
// exit; 

if (!isset($_SESSION['Id']) || $_SESSION['Roles'] != 'consumer') {
    header("Location: consumerLogin.php");
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
    <link rel="stylesheet" href="../CSS/Consumer/consumerUser.css">
    <title>Consumer</title>
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
        
    </style>
</head>
<body>
    <div id="header"></div>

    <div class="main-content">
        <!-- PROFILE PICTURE -->
        <div id="profilePicContainer">
            <img src="../pictures/sustain-communities.jpg" alt="profile picture">
        </div>

        <!-- USERNAME -->
        <h1>Username</h1>

        <div id="consumerButtonContainer">
            <button id="consumer-edit-button"><img src="../icons/editWhite.png" alt="edit"></button>
            <a id="customer-cart-button" href="cart.html"><img src="../icons/cart-green.png" alt="cart"></a>
            <a id="consumer-chat-button" href="../BOTH/chat.html"><img src="../icons/message.png" alt="chats"></a>
            <a href="../logout.php"> <button id="logout-button">Logout</button> </a>
        </div>

        <!-- NAVIGATION -->
        <div id="navigation">
            <h2><a href="#" class="nav-link active" data-target='GenInformation'>General Information</a></h2>
            <h2><a href="#" class="nav-link" data-target='orders'>Orders</a></h2>
            <h2><a href="#" class="nav-link" data-target='purchaseHistory'>Purchase History</a></h2>
        </div>

        <div id="info-container">
            <!-- GENERAL INFORMATION -->
            <div id="GenInformation">
                <p>Address: </p> <!-- Address details -->
                <p>Email: </p>
                <p>Phone: </p>
            </div>

            <!-- ORDERS -->
            <div id="orders" class="hidden">
                <table id="orders-table">
                    <tr>
                        <th colspan="2">Product</th>
                        <th>Price each</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>

                    <!-- examples -->
                    <tr>
                        <!-- picture and name -->
                        <td id="product-pic-container">
                            <img src="../pictures/egg.png" alt="">
                        </td>

                        <td><p>Product1</p></td> <!-- Product Name -->
                        <td>5.00</td> <!-- Price each -->
                        <td>4</td> <!-- Quantity -->
                        <td>20.00</td> <!-- Total Price -->

                        <!-- Actions -->
                        <td id="action-cell">
                            <a href="ConsumerOrderView.html"><button class="view-button">view</button></a>
                            <button class="delete-button">cancel</button>
                        </td>
                    </tr>
                </table>
                <br>
            </div>

            <!-- PURCHASE HISTORY -->
            <div id="purchaseHistory" class="hidden">
                <table id="purchase-history-table">
                    <tr>
                        <th>OrderID</th>
                        <th>Date Received</th>
                        <th>Seller</th>
                        <th>Selling Type</th>
                        <th>Total Cost</th>
                        <th>Action</th>
                    </tr>

                    <!-- examples -->
                    <tr>
                        <td>12345</td>
                        <td>1/2/2024</td>
                        <td>Juan Tamad</td>
                        <td>Delivery</td>
                        <td>120.00</td>

                        <!-- Actions -->
                        <td id="action-cell">
                            <a href="ConsumerOrderView.html"><button class="view-button">view</button></a>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
    <br><br><br><br><br><br><br>

    <!-- Footer Placeholder -->
    <div id="footer"></div>

    <!-- JS FOR LOADING HEADER AND FOOTER -->
    <script src="../JS/Farmer/farmerHeaderFooter.js"></script>

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

