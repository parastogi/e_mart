<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'e_mart';
	$db = mysql_connect($host,'root','') or die("Unable to Connect to Database");
	$db1= mysql_select_db($db_name) or die("Unable to select to Database");
	
	if(!isset($_SESSION))
		session_start();
	$user =$_SESSION['username'];
	$sql = "SELECT i_id from cart where m_username = '$user'";
	$result = mysql_query($sql);

	if(mysql_num_rows($result)>0){
		$sql = "SELECT sum(price) as sum from item where i_id IN (SELECT i_id from cart where m_username = '$user')";
		$result = mysql_query($sql);
		$sum = mysql_fetch_array($result);
		$sql = "INSERT INTO `order_details`(order_date, amount) VALUES(now(), $sum[sum])";
		$res = mysql_query($sql) or die("Insertion failed");
		$o_id = mysql_insert_id($db);
		$sql = "INSERT INTO member_purchases VALUES('$o_id', '$user')";
		$res = mysql_query($sql) or die("Insertion failed");
		
		$sql = "SELECT * from cart WHERE m_username='$user'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_assoc($result)){
			$i_id = $row['i_id'];
			$sql = "INSERT INTO order_has_items(o_id, i_id) VALUES('$o_id', '$i_id')";
			$insert = mysql_query($sql) or die('Fail');
		}
		
		$sql = "UPDATE item SET available=available-1 where i_id IN (SELECT i_id from cart where m_username = '$user')";
		$res = mysql_query($sql) or die("Insertion failed");
		$sql = "INSERT INTO invoice(pay_date) VALUES(now())";
		$res = mysql_query($sql) or die("2 Insertion failed");
		$invoice_id = mysql_insert_id($db);
		$sql = "INSERT INTO order_has_invoice VALUES('$invoice_id', '$o_id')";
		$res = mysql_query($sql) or die("3 Insertion failed");
		$sql = "DELETE from cart where m_username = '$user'";
		$result = mysql_query($sql);
		header('Location: ../index.php');
	}
?>