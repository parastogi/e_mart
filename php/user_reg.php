<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'e_mart';
	$db = @mysql_connect($host,'root','') or die("Unable to Connect to Database");
	$db1= @mysql_select_db($db_name) or die("Unable to select to Database");

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$name = $firstname." ".$lastname;
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

		$sql = "INSERT INTO member VALUES('$username', '$name', '$password', '$address', '$email', '$phone')";
		$result = mysql_query($sql) or die("Fail to update database.");
		session_start();
		$_SESSION['type'] = "member";
		$_SESSION['name'] = $name;
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['phone'] = $phone;
		$_SESSION['address'] = $address;
		
		header('Location: ../userprofile.php');	//}

?>
