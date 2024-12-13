<?php
// Start session
session_start();

// Include database connection
include 'C:\xampp\htdocs\HarvestHub\db_connect.php';

$message = ""; // To display login error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Email = $_POST['Email'];
    $Password = md5($_POST['Password']); // Password hashed with MD5

    // Check user in the database
    $sql = "SELECT * FROM tbl_farmeraccount WHERE Email = '$Email' AND Password = '$Password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        $_SESSION['Id'] = $user['Id'];
        $_SESSION['firstName'] = $user['firstName'];

        // Redirect to farmers
        header("Location: farmers.php");
        exit;
       
    } else {
        $message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../CSS/signUp.css">

    <title>Farmer Login</title>
</head>
<body>
    <br>
    <a onclick="history.back()"><img src="../icons/back.png" alt="back"></a>
    <h1>Farmer Login</h1>

    <form method="POST" action="">
        <div>
            <!-- EMAIL -->
            <label for="username">Email</label><br>
            <input type="text" name="Email" placeholder="Enter your first name" id="Email" required>
            <br><br>

            <!-- PASSWORD -->
            <label for="password">Password</label><br>
            <input type="password" name="Password" id="Password" required>
            <br><br><br>
            <p>Don't have an account? <a href="signUpAs.html">Signup here</a>.</p>
            <input type="submit" class="submit-button">
        </div>
    </form>
</html>