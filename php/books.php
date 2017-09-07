<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'e_mart';
	$db = @mysql_connect($host,'root','') or die("Unable to Connect to Database");
	$db1= @mysql_select_db($db_name) or die("Unable to select to Database");
	$sql = "SELECT * FROM item WHERE category='Books' AND available>=1";
	$result = @mysql_query($sql) or die("Fail");
	$row = @mysql_fetch_assoc($result);
?>