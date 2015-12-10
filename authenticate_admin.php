<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'eko';
$DB = "iShopping";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $DB);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT *
        FROM admin
        WHERE '".$user."' like name AND '".$pass."' like pass
        ";
        
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
//echo true;
header("Location:admin.html");
}
exit();
?> 
