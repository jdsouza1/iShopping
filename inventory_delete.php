<?php
$servername = "localhost";
$username = "eorndahl1";
$pass = "eorndahl1";
$DB = "eorndahl1";

$conn = new mysqli($servername, $username, $pass, $DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_POST['id'];

$sql = "delete from inventory where item_id = '".$id."'";

if ($conn->query($sql) === TRUE) {
    echo "deletion successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
exit();  
?>