<?php
$servername = "localhost";
$username = "eorndahl1";
$pass = "eorndahl1";
$DB = "eorndahl1";

$conn = new mysqli($servername, $username, $pass, $DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$description = $_POST['description'];
$price = $_POST['price'];
$insert = "('$description','$price')";

$sql = "INSERT INTO inventory(description, price) VALUES $insert";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
exit();  
?>