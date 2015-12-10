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
// $email = "eorndahl@gmail.com";
// $pass = "foo";

$pass = md5($userPass."Capsicum annuum");

$sql = "SELECT *
        FROM customers
        WHERE '".$email."' like email AND '".$pass."' like pass
        ";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
echo true;
}
exit();
?> 