<?php
session_start();
include 'db_connect.php';

if ($_SESSION['role'] !== 'consumer') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Farmers</title>
</head>
<body>
    <h1>Search Farmers by Address</h1>
    <form method="GET" action="search_farmers.php">
        <label for="address">Enter Address:</label>
        <input type="text" name="address" id="address" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>
