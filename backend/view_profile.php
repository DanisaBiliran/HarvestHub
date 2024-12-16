<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get the user ID from the query string
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

if ($user_id === 0) {
    echo "Invalid user ID.";
    exit;
}

// Fetch user details
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>
</head>
<body>
    <h1>Profile of <?php echo htmlspecialchars($user['name']); ?></h1>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
    <p><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>

    <?php if ($user['role'] === 'farmer'): ?>
        <p><strong>Farmer-Specific Info:</strong> (Add relevant details here)</p>
    <?php endif; ?>

    <a href="javascript:history.back()">Back</a>
</body>
</html>
