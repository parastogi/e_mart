<?php
	include_once('php/db_connect.php');
	$user = $_SESSION['username'];
	$sql = "SELECT * from item i
			inner join order_has_items oi
			on  oi.i_id = i.i_id
			inner join `order_details` o
			on o.o_id = oi.o_id
			inner join  member_purchases m
			on oi.o_id = m.o_id
			inner join staffadditem si
			on si.i_id = oi.i_id
			inner join staff s
			on s.s_username = si.s_username
			WHERE m.m_username='$user'
			ORDER BY o.o_id ASC";
	$result = mysql_query($sql);
	//$row = mysql_fetch_all($result);

	$sql = "SELECT oi.o_id, COUNT(oi.i_id) count from item i
			inner join order_has_items oi
			on  oi.i_id = i.i_id
			inner join `order_details` o
			on o.o_id = oi.o_id
			inner join  member_purchases m
			on oi.o_id = m.o_id
			inner join staffadditem si
			on si.i_id = oi.i_id
			inner join staff s
			on s.s_username = si.s_username
			WHERE m.m_username='$user'
			GROUP BY o.o_id
			ORDER BY o.o_id ASC";
	$result1 = mysql_query($sql);
	//$row1 = mysql_fetch_all($result);
?>