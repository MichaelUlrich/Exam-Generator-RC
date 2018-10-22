<?php
error_reporting(E_ALL | E_STRICT);

$servername = "sql2.njit.edu";
$serverUsername = "ek95";
$serverPassword = "epi8o1iaT";
 $db = "ek95";
 // Create connection
 $conn = mysqli_connect("sql2.njit.edu", "ek95", "dRKyQ7DZ", "ek95");
 mysqli_select_db($conn, 'ek95');

 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . mysqli_connect_error());
 } //else {
 //     echo "\0"; //Won't echo any text without for some reason
//}


$query = mysqli_query($conn, "SELECT * FROM teacher");
$row = mysqli_fetch_array($query);


$hashed_user_pw = MD5($_POST['password']);

//echo $hased_user_pw; //. "/" $row['password'];

if($row['username'] == $_POST['username'] && $row['password'] == $hashed_user_pw) {
        $json_array = array(
                "teacher" => "true"
        );
        echo json_encode($json_array);
        //echo 'Database Logged in' . "<br>";
}

$query = mysqli_query($conn, "SELECT * FROM student");
$row = mysqli_fetch_array($query);

if($row['username'] == $_POST['username'] && $row['password'] == $hashed_user_pw) {
        $json_array = array(
                "student" => "true"
        );
        echo json_encode($json_array);
}                                       //echo 'Database Logged in' . "<br>";
/*else {
        $json_array = array(
                "l" => "false"
        );
        echo json_encode($json_array);
}*/

 mysqli_close($conn);
?>
