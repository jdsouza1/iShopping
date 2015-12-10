<?php
$servername = "localhost";
$username = "root";
$pass = "eko";
$DB = "iShopping";

$conn = new mysqli($servername, $username, $pass, $DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$item_id = $_POST['item_id'];
$tag = $_POST['tag'];
$insert = "('$item_id','$tag')";

$sql = "INSERT INTO tags VALUES $insert";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
exit();  
?>