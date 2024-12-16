<?php
// Start session
session_start();

// Include database connection
include 'db_connect.php';

$message = ""; // To display login error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Password hashed with MD5

    // Check user in the database
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User exists, set session variables
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] == 'farmer') {
            header("Location: farmer_dashboard.php");
        } else {
            header("Location: consumer_dashboard.php");
        }
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
    <h1>Login</h1>
    <?php if ($message): ?>
            <p class="error"><?php echo $message; ?></p>
        <?php endif; ?>
    <form action="" method="POST">
        <div>
            <!-- USERNAME -->
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required>
            <br><br>

            <!-- PASSWORD -->
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required>
            <br><br><br>

            <input type="submit" class="submit-button">
        </div>
    </form>
    <div style="margin-right: 100px;">
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</body>
</html>
