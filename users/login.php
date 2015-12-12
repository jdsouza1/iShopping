<?php
	include "../database/config.php";
	include "../common/alert.php";
	$connection = new mysqli($servername, $username, $pass, $DB);

	if ($connection->error) {
		die("Database error: " + $connection->error);
	}
	
	$email = trim($_POST["email"]);
	$password = $_POST["password"];
	
	if (strlen($email) == 0 || strlen($password) == 0) {
		alert("Please fill in all fields!", "register.html");
		die();
	}
	$password = md5($password.$email);
	$sql = "SELECT * FROM `customers` WHERE `email` LIKE \"$email\" AND `pass`=\"$password\"";
	$records = $connection->query($sql);
	if ($connection->error) {
		die("Database error: " + $connection->error);
	}
	if ($records->num_rows > 0) {
		$record = $records->fetch_assoc();
		$customer_id = $record["id"];
		session_start();
		$_SESSION["customer_id"] = $customer_id;
	} else {
		alert("Email or Password is wrong!", "login.html");
	}
?>