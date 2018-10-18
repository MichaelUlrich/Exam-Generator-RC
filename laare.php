<?php
$servername = "localhost";
$username = "root";
$password = "yourpassword";
$db = "yourdatabase";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
 mysqli_select_db($conn, 'top');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
