<?php
	ob_start();
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'e_mart';
	$db = @mysql_connect($host,'root','') or die("Unable to Connect to Database");
	$db1= @mysql_select_db($db_name) or die("Unable to select to Database");
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(isset($_POST['isstaff'])){
		$sql = "SELECT * FROM staff WHERE s_username='$username' AND s_password='$password'";
		$result = @mysql_query($sql) or die(" staff Login System Failed");	
		$row = @mysql_fetch_array($result);
		if(@mysql_num_rows($result)==1) {
			session_start();
			$_SESSION['type'] = "staff";
			$_SESSION['name'] = $row['s_name'];
			$_SESSION['username'] = $row['s_username'];
			$_SESSION['email'] = $row['s_email'];
			$_SESSION['phone'] = $row['s_phone'];
			$_SESSION['address'] = $row['s_address'];
			
			header('Location: ../staffprofile.php');
		}
		else
			header('Location: ../login.php');
	}
	else{
		$sql = "SELECT * FROM member WHERE m_username='$username' AND m_password='$password'";
		$result = @mysql_query($sql) or die("user Login System Failed");
		$row = @mysql_fetch_array($result);
		if(@mysql_num_rows($result)==1) {
			session_start();
			$_SESSION['type'] = "member";
			$_SESSION['name'] = $row['m_name'];
			$_SESSION['username'] = $row['m_username'];
			$_SESSION['email'] = $row['m_email'];
			$_SESSION['phone'] = $row['m_phone'];
			$_SESSION['address'] = $row['m_address'];
			header('Location: ../index.php');
		}
		else
			header('Location: ../login.php');
	}
	ob_flush();
?>