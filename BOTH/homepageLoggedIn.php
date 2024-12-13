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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../CSS/homepage.css" />
    <title>HarvestHub</title>
  </head>
  <body>
<!-- debug -->
<!-- <h1>Welcome, <?php //echo htmlspecialchars($_SESSION['firstName']); ?>!</h1> -->
 
    <nav>
      <div class="logo-container">
        <div class="logo"><img src="../pictures/ALCED/HarvestHub_logo.png" /></div>
        <div class="nav-logo">HarvestHub<span>.</span></div>
      </div>
      <ul class="nav-links">
        <li class="link"><a href="#">Home</a></li>
        <li class="link"><a href="shop.html">Shop</a></li>
        <li class="link"><a href="about-us.html">About us</a></li>
        <li class="link"><a href="contacts.html">Contact</a></li>
      </ul>
      
    </nav>
    <header>
      <div class="section-container header-container">
        <div class="header-image">
          <img src="../pictures/ALCED/header1.jpg" alt="header" />
          <img src="../pictures/ALCED/header2.jpg" alt="header" />
        </div>
        <div class="header-content">
          <div>
            <h1>Connecting Farmers<br />and Consumers</h1>
            <p class="section-subtitle">
              Shop fresh produce directly from local farmers, and experience the
              difference that quality, care, and sustainable farming bring to
              your table with every bite.
            </p>
            <div class="action-btns">
              <a href="shop.html"><button class="btn">Browse</button></a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="section-container destination-container">
      <div class="section-header">
        <div>
          <h2 class="section-title">Explore top Farmers</h2>
          <p class="section-subtitle">
            Discover the perfect farmer to meet your needs. Here, you can find
            dedicated growers offering quality produce tailored just for you.
          </p>
        </div>
        <div class="destination-nav">
          <span><i class="ri-arrow-left-s-line"></i></span>
          <span><i class="ri-arrow-right-s-line"></i></span>
        </div>
      </div>
      <div class="destination-grid">
        <div class="destination-card">
          <img src="../pictures/ALCED/farmer1.jpg" alt="destination" />
          <div class="destination-details">
            <p class="destination-title">Juan Cruz</p>
            <p class="destination-subtitle">Ayala</p>
          </div>
        </div>
        <div class="destination-card">
          <img src="../pictures/ALCED/farmer2.jpg" alt="destination" />
          <div class="destination-details">
            <p class="destination-title">Eric Capitan</p>
            <p class="destination-subtitle">Cawit</p>
          </div>
        </div>
        <div class="destination-card">
          <img src="../pictures/ALCED/farmer3.jpg" alt="destination" />
          <div class="destination-details">
            <p class="destination-title">Pogi Madiales</p>
            <p class="destination-subtitle">Recodo</p>
          </div>
        </div>
        <div class="destination-card">
          <img src="../pictures/ALCED/farmer2.jpg" alt="destination" />
          <div class="destination-details">
            <p class="destination-title">Kinno</p>
            <p class="destination-subtitle">China</p>
          </div>
        </div>
      </div>
    </section>

    <section class="trip">
      <div class="section-container trip-container">
        <h2 class="section-title">Featured products</h2>
        <p class="section-subtitle">
          Explore a variety of products grown with care. Here, you’ll find
          fresh, quality produce that’s perfect for your needs.
        </p>
        <div class="trip-grid">
          <div class="trip-card">
            <img src="../pictures/ALCED/product1.jpg" alt="trip" />
            <div class="trip-details">
              <p>Organic Spinach</p>
              <div class="rating"><i class="ri-star-fill"></i> 4.2</div>
              <div class="booking-price">
                <div class="price"><span>From</span> 10.00/lb</div>
                <button class="book-now">Buy Now</button>
              </div>
            </div>
          </div>
          <div class="trip-card">
            <img src="../pictures/ALCED/product2.jpg" alt="trip" />
            <div class="trip-details">
              <p>Sweet Mangoes</p>
              <div class="rating"><i class="ri-star-fill"></i> 4.5</div>
              <div class="booking-price">
                <div class="price"><span>From</span> 40.00/kg</div>
                <button class="book-now">Buy Now</button>
              </div>
            </div>
          </div>
          <div class="trip-card">
            <img src="../pictures/ALCED/product3.jpg" alt="trip" />
            <div class="trip-details">
              <p>Free-Range Eggs</p>
              <div class="rating"><i class="ri-star-fill"></i> 4.7</div>
              <div class="booking-price">
                <div class="price"><span>From</span> 60.00/dozen</div>
                <button class="book-now">Buy Now</button>
              </div>
            </div>
          </div>
        </div>
        <div class="view-all">
          <a href="products.html"><button class="btn">View All</button></a>
          
        </div>
      </div>
    </section>

    <section class="gallary">
      <div class="section-container gallary-container">
        <div class="image-gallary">
          <div class="gallary-col">
            <img src="../pictures/ALCED/ZAMBOANGA_CITY.jpg" alt="gallary" />
          </div>
          <div class="gallary-col">
            <img src="../pictures/ALCED/loc.jpg" alt="gallary" />
          </div>
        </div>
        <div class="gallary-content">
          <div>
            <h2 class="section-title">
              Locate the nearest farms and pickup points
            </h2>
            <p class="section-subtitle">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi
              ipsum amet temporibus qui, maxime beatae animi excepturi, quo
              aliquid provident iste nobis sequi fuga dicta id unde voluptates
              ad delectus!
            </p>
            <a href="../BOTH/locateFarms.html"><button class="btn">View</button></a>
            
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="section-container footer-container">
        <div class="footer-col">
          <h3>HarvestHub<span>.</span></h3>
          <p>
            Explore your suitable farmer here in the Philippines. Here you can
            fresh produce products.
          </p>
        </div>
        <div class="footer-col">
          <h4>Support</h4>
          <p>FAQs</p>
          <a href="terms-conditions.html"><p>Terms & Conditions</p></a>
          <a href="privacy-terms.html"><p>Privacy Policy</p></a>
          <a href="contacts.html"><p>Contact Us</p></a>
        </div>
        <div class="footer-col">
          <h4>Address</h4>
          <p><span>Address:</span> Philippines, Zamboanga City</p>
          <p><span>Email:</span> info@harvesthub.com</p>
          <p><span>Phone:</span> +63 9610585703</p>
        </div>
      </div>
      <div class="footer-bar">
        Copyright © 2024 HarvestHub. All rights reserved.
      </div>
    </footer>
  </body>
</html>
