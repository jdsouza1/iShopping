<?php
$servername = "localhost";
$username = "root";
$pass = "eko";
$DB = "iShopping";

$conn = new mysqli($servername, $username, $pass, $DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_POST['email'];
$pass = $_POST['pass'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$passHash = md5($user."Capsicum annuum");
$insert = "('$email','$passHash', '$fName', '$lName')";

$sql = "INSERT INTO USERS VALUES $insert";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
exit();  
?>