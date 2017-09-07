<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'e_mart';
	$db = @mysql_connect($host,'root','') or die("Unable to Connect to Database");
	$db1= @mysql_select_db($db_name) or die("Unable to select to Database");

	if(!isset($_SESSION))
		session_start();
	$user = $_SESSION['username'];
	$id = $_POST['id'];
	if($_SESSION['type']=='member') {
		$sql = "Select * from cart where m_username='$user' AND i_id=$id";
		$result = @mysql_query($sql);
		if(@mysql_num_rows($result)==0) {
			$sql = "Insert into cart
					values ('$user', $id)";
			$result = @mysql_query($sql);
			echo 2;
		} else
			echo 1;
	} else 
		echo 0;
?>