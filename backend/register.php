<?php
include 'db_connect.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];
    $role = $_POST['role'];

    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        $message = "This email is already registered.";
    } else {
        $sql = "INSERT INTO users (name, email, password, address, role) VALUES ('$name', '$email', '$password', '$address', '$role')";
        
        if ($conn->query($sql) === TRUE) {
            $message = "Registration successful! You can now log in.";
        } else {
            $message = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - HarvestHub</title>
    <link rel="stylesheet" href="../CSS/signUp.css">
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div>
                <label for="name">Full Name:</label><br>
                <input type="text" name="name" id="name" required>
                <br>
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" required>
                <br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required>
                <br>
            </div>
            <br>
            <div>
            <label for="address">Address:</label><br>
            <select id="address" name="address" required>
                <option value="Arena Blanco">Arena Blanco</option>
                <option value="Ayala">Ayala</option>
                <option value="baliwasan">Baliwasan</option>
                <option value="banguingui">Banguingui</option>
                <option value="bangkal">Bangkal</option>
                <option value="baragay">Baragay</option>
                <option value="bato">Bato</option>
                <option value="boalan">Boalan</option>
                <option value="bolong">Bolong</option>
                <option value="buenavista">Buenavista</option>
                <option value="cabaluay">Cabaluay</option>
                <option value="cabañangan">Cabañangan</option>
                <option value="cabatangan">Cabatangan</option>
                <option value="cacao">Cacao</option>
                <option value="calabasa">Calabasa</option>
                <option value="calarain">Calarian</option>
                <option value="camino_nuevo">Camino Nuevo</option>
                <option value="campo_islam">Campo Islam</option>
                <option value="canelar">Canelar</option>
                <option value="capisan">Capisan</option>
                <option value="divisoria">Divisoria</option>
                <option value="dulian_upper">Dulian (Upper)</option>
                <option value="dulian_lower">Dulian (Lower)</option>
                <option value="fatima">Fatima</option>
                <option value="guisao">Guisao</option>
                <option value="la_paz">La Paz</option>
                <option value="lunzuran">Lunzuran</option>
                <option value="manicahan">Manicahan</option>
                <option value="mercedes">Mercedes</option>
                <option value="muti">Muti</option>
                <option value="pamucutan">Pamucutan</option>
                <option value="pasonanca">Pasonanca</option>
                <option value="putik">Putik</option>
                <option value="san_jose_gusu">San Jose Gusu</option>
                <option value="san_roque">San Roque</option>
                <option value="santa_barbara">Santa Barbara</option>
                <option value="santa_maria">Santa Maria</option>
                <option value="santo_nino">Santo Niño</option>
                <option value="sinunuc">Sinunuc</option>
                <option value="sumagdang">Sumagdang</option>
                <option value = "talon_talon" > Talon-Talon </option >
                <option value = "taluksangay" > Taluksangay </option >
                <option value = "tetuan" > Tetuan </option >
                <option value = "tumaga" > Tumaga </option >
                <option value = "vitali" > Vitali </option >
                <option value = "zambowood" > Zambowood </option >
                <option value = "bungiao" > Bunguiao </option >
                <option value = "campo_islam_upper" > Campo Islam (Upper) </option >
                <option value = "campo_islam_lower" > Campo Islam (Lower) </option >
                <option value = "don_pablo_lorenzo_village" > Don Pablo Lorenzo Village </ option >
                <option value = "la_purisima" > La Purisima </option >
                <option value = "lumbangan" > Lumbangan </option >
                <option value = "mampang" > Mampang </option >
                <option value = "muti_upper" > Muti (Upper) </option >
                <option value = "putik_lower" > Putik (Lower) </option >
                <option value = "san_jose_upper" > San Jose (Upper) </option >
                <option value = "san_jose_lower" > San Jose (Lower) </option >
                <option value = "san_juan" > San Juan </option >
                <option value = "san_pedro" > San Pedro </option >
                <option value = "santa_catalina" > Santa Catalina </option >
                <option value = "santa_cruz" > Santa Cruz </option >
                <option value = "santa_maria_upper" > Santa Maria (Upper) </option >
                <option value = "santa_maria_lower" > Santa Maria (Lower) </option >
                <option value = "santo_nino_upper" > Santo Niño (Upper) </option >
                <option value = "santo_nino_lower" > Santo Niño (Lower) </option >
                <option value = "sinunuc_upper" > Sinunuc (Upper) </option >
                <option value = "sinunuc_lower" > Sinunuc (Lower) </option >
                <option value = "tictapul" > Tictapul </option >
                <option value = "tigbalabag" > Tigbalabag </option >
                <option value = "tugbungan" > Tugbungan </option >
                <option value = "tumitus" > Tumitus </option >
                <option value = "victoria" > Victoria </options >
            </select >
                <br>
                <label for="role">Role:</label><br>
                <select name="role" id="role" required>
                    <option value="farmer">Farmer</option>
                    <option value="consumer">Consumer</option>
                </select>
                <br><br>
                <button type="submit" class="submit-button">Register</button>
            </div>
        </form>
        <p>Already have an account? <a href="login.php">Log in here</a>.</p>
    </div>
</body>
</html>
