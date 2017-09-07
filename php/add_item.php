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
	$itemname = $_POST['itemname'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$available=$_POST['quantity'];
	$sql = "INSERT INTO item (i_name, category, price, description,available)
			VALUES ('$itemname', '$category', '$price', '$description','$available');";

	$result = @mysql_query($sql);
	$sql = "SELECT LAST_INSERT_ID();";
	$result = @mysql_query($sql);
	$row = @mysql_fetch_row($result);
	$item_id = $row[0];

	$sql = "INSERT INTO staffadditem (s_username, i_id, date_added)
			VALUES ('$user', $item_id, now());";
	$result = @mysql_query($sql);

	$target_dir = "../images/itemimages/";
	mkdir($target_dir.$item_id,0777);
	$target_dir = "../images/itemimages/".$item_id."/";

	for($i=1;$i<=4;$i++) {
		if(isset($_FILES["image".$i])) {
			$target_file = $target_dir . basename($i.".jpg");
			move_uploaded_file($_FILES["image".$i]["tmp_name"], $target_file);
		} else
			break;
	}
	header('Location: ../staffprofile.php');
?>