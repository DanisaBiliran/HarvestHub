<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user details for pre-filling the form
$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);
if ($result->num_rows === 0) {
    die("User not found.");
}
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);

    // Update user details
    $sql_update = "UPDATE users SET name = '$name', email = '$email', address = '$address' WHERE user_id = $user_id";
    if ($conn->query($sql_update)) {
        $_SESSION['message'] = "Profile updated successfully!";
        header("Location: profile.php");
        exit;
    } else {
        $error = "Error updating profile: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
</head>
<body>
    <h1>Update Profile</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="profile.php">Cancel</a>
</body>
</html>
