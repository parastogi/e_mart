<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'e_mart';
	$db = @mysql_connect($host,'root','') or die("Unable to Connect to Database");
	$db1= @mysql_select_db($db_name) or die("Unable to select to Database");
	if(!isset($_SESSION))
		session_start();
	$user=$_SESSION['username'];
	$name=$_POST['name'];;
	$email=$_POST['email'];
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$sql="SELECT s_password from staff where s_username='$user'";
	$result=@mysql_query($sql);
	$pass=@mysql_fetch_assoc($result);

	if($oldpassword == $pass['s_password']){
		$sql = "UPDATE staff SET s_name='$name', s_password='$newpassword', s_address='$address', s_email='$email', s_phone=$phone WHERE s_username='$user'";
		$result=@mysql_query($sql);

		$target_dir = "../images/staffprofileimages/";
		if(isset($_FILES["profileimage"])) {

			if(file_exists("../images/staffprofileimages/".$user.".jpg")){
				unlink("../images/staffprofileimages/".$user.".jpg");
			}

			$target_file = $target_dir . basename($user.".jpg");
			move_uploaded_file($_FILES["profileimage"]["tmp_name"], $target_file);
		}
		
		if($result) {
			$_SESSION['name'] = $name;
			$_SESSION['address'] = $address;
			$_SESSION['email'] = $email;
			$_SESSION['phone'] = $phone;
			header('Location: ../staffprofile.php');
		}
		else
			echo "Fail";
	}
?>