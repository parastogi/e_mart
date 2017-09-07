<?php
	include('php/db_connect.php');
	$i_id = $_GET['id'];
	$sql = "SELECT * FROM item where i_id=$i_id";
	$result = mysql_query( $sql);
	$row1 = mysql_fetch_assoc($result);
	$sql = "SELECT s_name FROM staff s
			inner join staffadditem i
			on s.s_username = i.s_username
			where i.i_id=$i_id";
	$result = mysql_query($sql);
	$row2 = mysql_fetch_assoc($result);
?>