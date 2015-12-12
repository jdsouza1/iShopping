<?php
	include "../database/config.php";
	include "../common/alert.php";
	$connection = new mysqli($servername, $username, $pass, $DB);

	if ($connection->error) {
		die("Database error: " + $connection->error);
	}
	
	$email = trim($_POST["email"]);
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$password = $_POST["password"];
	$confirm = $_POST["confirm"];
	
	if (strlen($email) == 0 || strlen($firstName) == 0 || strlen($lastName) == 0 || strlen($password) == 0 || strlen($confirm) == 0) {
		alert("Please fill in all fields!", "register.html");
		die();
	}
	if ($confirm == $password) {
		if (preg_match("/.+@.+(\\..+)+/", $email)) {
			$sql = "SELECT * FROM `customers` WHERE email LIKE \"$email\"";
			$records = $connection->query($sql);
			if ($connection->error) {
				die("Database error: " + $connection->error);
			}
			if ($records->num_rows == 0) {
				$password = md5($password.$email);
				$sql = "INSERT INTO `customers` (`pass`, `email`, `fName`, `lName`)"
						." VALUES ('$password', '$email', '$firstName', '$lastName');";
				$connection->query($sql);
				if ($connection->error) {
					die("Database error: " + $connection->error);
				}
				alert("Registration successful!", "login.html");
			} else {
				alert("This email was already used!", "register.html");
			}
		} else {
			alert("Invalid email!", "register.html");
			die();
		}
	} else {
		alert("Password and Confirmation don't match!", "register.html");
		die();
	}
?>