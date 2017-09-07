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
	$sql = "delete from  cart where m_username='$user'";
	mysql_query($sql);
?>