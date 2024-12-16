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
    <title>My Profile</title>
</head>
<body>
    <h1>My Profile</h1>
    <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
    <p><strong>Role:</strong> <?php echo ucfirst($user['role']); ?></p>

    <a href="update_profile.php">Edit Profile</a>
    <br>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
