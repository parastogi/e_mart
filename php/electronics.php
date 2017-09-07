<?php
	require_once('db_connect.php');
	$sql = "SELECT * FROM item WHERE category='Electronics' AND available=1";
	$result = mysql_query($sql) or die("Fail");
	$row = mysql_fetch_assoc($result);
?>