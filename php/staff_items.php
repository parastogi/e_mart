<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'e_mart';
	$db = @mysql_connect($host,'root','') or die("Unable to Connect to Database");
	$db1= @mysql_select_db($db_name) or die("Unable to select to Database");
	$user = $_SESSION['username'];
	$sql = "SELECT * from item i
			INNER JOIN staffadditem s 
			ON i.i_id=s.i_id 
			WHERE s_username='$user'";
	$result = @mysql_query($sql);
	$row = @mysql_fetch_all($result);
?>