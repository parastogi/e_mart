<?php
	include_once('db_connect.php');
	$o_id = $_GET['id'];
	$sql = "SELECT * FROM item i
			inner join order_has_items oi
			on oi.i_id = i.i_id
			inner join staffadditem si
			on si.i_id = i.i_id
			inner join staff s
			on s.s_username = si.s_username
			WHERE oi.o_id = $o_id";
	$result = mysql_query($sql);
	//$row = mysql_fetch_assoc($result);

	$sql = "SELECT SUM(i.price) sum FROM item i
			inner join order_has_items oi
			on oi.i_id = i.i_id
			inner join staffadditem si
			on si.i_id = i.i_id
			inner join staff s
			on s.s_username = si.s_username
			WHERE oi.o_id = $o_id";
	$result = mysql_query($sql);
	$row1 = mysql_fetch_assoc($result);
?>