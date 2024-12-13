<?php
// Include database connection
include 'C:\xampp\htdocs\HarvestHub\db_connect.php';

$message = ""; // To display success or error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $Street = $_POST['Street'];
    $Barangay = $_POST['Barangay'];
    $City = $_POST['City'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Password = md5($_POST['Password']); // Hash the password
    $Roles = $POST['Roles'];


    // Check if the email already exists
    $check_email = "SELECT * FROM tbl_consumeraccount WHERE Email = '$Email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        $message = "This email is already registered.";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO tbl_consumeraccount (firstName, lastName, Street, Barangay, City, Email, Phone, Password) VALUES ('$firstName', '$lastName', '$Street', '$Barangay', '$City', '$Email','$Phone','$Password')";
        
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
    
    <link rel="stylesheet" href="../CSS/signUp.css">

    <title>Consumer Sign Up</title>
</head>
<body>
    <br>
    <a onclick="history.back()"><img src="../icons/back.png" alt="back"></a>
    <h1>Consumer Sign Up</h1>

    <form action="consumerSignUp.php" method="POST">
        <div>
            <!-- FIRST NAME -->
            <label for="first-name">First Name</label><br>
            <input type="text" name="firstName" placeholder="Enter your first name" id="firstName" required>
            <br><br>

            <!-- LASTNAME -->
            <label for="last-name">Last Name</label><br>
            <input type="text" name="lastName" placeholder="Enter your lastname" id="lastName" required>
            <br>
        </div>   
        <br><br>

        <div>
            <!-- STREET -->
            <label for="street">Street</label><br>
            <input type="text" name="Street" placeholder="Enter street/zone" id="Street" required>
            <br><br>
            
            <!-- BARANGAY -->
            <label for="barangay">Barangay</label><br>
            <select id="Barangay" name="Barangay">
                <option value="arena_blanco">Arena Blanco</option>
                <option value="ayala">Ayala</option>
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
            <br><br>

            <!-- CITY- READONLY (set to Zamboanga City)-->
            <label for="city">City</label><br>
            <input type="text" name="City" placeholder="Zamboanga City" id="City"  readonly>
            <br>
        </div>
        <br><br>

        <div>
            <!-- EMAIL -->
            <label for="email">Email</label><br>
            <input type="email" name="Email" id="Email" placeholder="example@email.com"  >
            <br><br>

            <!-- PHONE -->
            <label for="phone">Phone</label><br>
            <input type="phone" name="Phone" id="Phone" placeholder="09123456789"  >
            <br><br>

            <!-- PASSWORD -->
            <label for="password">Password</label><br>
            <input type="password" name="Password" id="Password" required>
            <br>

            <input type="hidden" name="Roles" id="Roles "customAttribute="consumer"/>

        </div>
        <br><br>

        <div id="submit">
            <input type="submit" class="submit-button">
        </div>

    </form>
</html>