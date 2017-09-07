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
	$name=$_POST['name'];
	$email=$_POST['email'];
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$sql="SELECT m_password from member where m_username='$user'";
	$result=@mysql_query($sql);
	$pass=@mysql_fetch_assoc($result);

	if($oldpassword == $pass['m_password']){
		$sql = "UPDATE member SET m_name='$name', m_password='$newpassword', m_address='$address', m_email='$email', m_phone=$phone WHERE m_username='$user'";
		$result=@mysql_query($sql);
		
		$target_dir = "../images/userprofileimages/";
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
			header('Location: ../userprofile.php');
		}
		else
			echo "Fail";
	}
?>