<!doctype html>
<html>
<head>
	<title>E-Mart</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	

	<!-- scripts go here -->
	<script src="js/jquery-1.12.2.js"></script>
	<script src="js/materialize.js"></script> 
	<script src="js/scripts.js"></script>
	 

</head>
<body class=""> 

	<div class="overlay overlay-contentpush">
		<span type="button" class="overlay-close"></span>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="books.php">Books</a></li>
			<li><a href="electronics.php">Electronics</a></li>
			<li><a href="clothing.php">Clothing</a></li>
		</ul>
	</div>

	<div class="row " id="page">
		
		<div class="row  lime darken-3" id="top-bar">
			<div class="col s3 left">
				<p class="brand-logo"><i class="material-icons">shopping_cart</i><a href="index.php" class="white-text">   E-Mart</a></p>
			</div>
			<div class="col s9 full-height">
				<div class="col s1 offset-s10 center-align icons" id="account">
					<?php
						ob_start();
						if(!isset($_SESSION))
							session_start();
						if(isset($_SESSION['type'])) { 
					?>
							<a href="javscript:void(0)" data-target=""><i class="material-icons waves-effect">account_circle</i></a>
							<ul class="" id="account-opts">
								<?php 
									if($_SESSION['type']=='member') { 
								?>
									<li><a href="userprofile.php" class=""><i class="material-icons left prefix">person</i><?php echo $_SESSION['name']; ?></a></li>
									<li id = "cart-no-of-items"><i class="material-icons left">shopping_cart</i><span id="cart_items_no">
										<?php
											include('php/cart_items.php');
											echo @mysql_num_rows($result);
										?>
									</span> items in cart</li>
								<?php 
									} if($_SESSION['type']=='staff') { 
								?>
									<li>
										<a href="staffprofile.php" class=""><i class="material-icons left prefix">person</i><?php echo $_SESSION['name']; ?></a>
									</li>
								<?php 
									} 
								?>
								<li class="center-align">
									<form action="php/logout.php" class="center-align">
										<button type="submit" value="logout" class="btn waves-effect waves-light">Log out</button>
									</form>
								</li>
							</ul>
						<?php 
							} else { 
						?>
							<a href="login.php"><i class="material-icons waves-effect">account_circle</i></a>
					<?php 
						} 
					?>
				</div>
				<div class="col s1 center-align icons" id="menu">
					<i class="material-icons waves-effect">menu</i>
				</div> 
			</div>
		</div>

		<div class="row">
			<img class="responsive-img " src="images/cover.png"/>
		</div>

		<div class="row showcase" id="home-showcase">

			<div class="col m10 offset-m1 s12 case" id="books">
				<p class="col s12 valign-wrapper">
					<a href="books.php" class="black-text tooltipped" data-tooltip="Click for more items" data-position="right">
						Books<i class="right material-icons small valign">keyboard_arrow_right</i>
					</a>
				</p>
				<?php
				$host = 'localhost';
				$username = 'root';
				$password = '';
				$db_name = 'e_mart';
				$db = @mysql_connect($host,'root','') or die("Unable to Connect to Database");
				$db1= @mysql_select_db($db_name) or die("Unable to select to Database");
				$sql = "SELECT * FROM item NATURAL JOIN v1 WHERE item.category='Books' AND item.available>=1";
					$sql1="CREATE VIEW v1 AS SELECT i_name,MIN(price) AS price FROM item GROUP BY i_name";
					$sql2="DROP VIEW v1";
					$result1 = mysql_query($sql1) or die("Fail view");
					$result = mysql_query($sql) or die("Fail query");
					$result2=mysql_query($sql2) or die("fail");
					$in=1;
					while($in<=8) {
						$row = mysql_fetch_assoc($result);
						if(isset($row)) {
							echo "<a class='col s2-5 white hoverable item center-align black-text' href='itempage.php?id=".$row['i_id']."'>
									<img src='images/itemimages/".$row['i_id']."/1.jpg' class='responsive-img'>
									<p class='item-name'>".$row['i_name']."</p>
									<p class='item-price green-text'>Rs. ".$row['price']."</p>
									<button class='btn-floating btn-large green white-text' id='buy-btn' type='submit' data-id='".$row['i_id']."'>
										<i class='material-icons waves-effect waves-light'>add_shopping_cart</i>
									</button>
								</a>";
						}
						else
							break;
						$in++;
					}
				?>
			</div>

			<div class="col m10 offset-m1 s12 case" id="electronics">
				<p class="col s12 valign-wrapper">
					<a href="electronics.php" class="black-text tooltipped" data-tooltip="Click for more items" data-position="right">
						Electronics<i class="right material-icons small valign">keyboard_arrow_right</i>
					</a>
				</p>
				<?php
					$host = 'localhost';
					$username = 'root';
					$password = '';
					$db_name = 'e_mart';
					$db = @mysql_connect($host,'root','') or die("Unable to Connect to Database");
					$db1= @mysql_select_db($db_name) or die("Unable to select to Database");
					$sql = "SELECT * FROM item NATURAL JOIN v1 WHERE item.category='Electronics' AND item.available>=1";
					$sql1="CREATE VIEW v1 AS SELECT i_name,MIN(price) FROM item GROUP BY i_name";
					$sql2="DROP VIEW v1";
					$result1 = mysql_query($sql1) or die("Fail");
					$result = mysql_query($sql) or die("Fail");
					$result2=mysql_query($sql2) or die("fail");
					$in=1;
					while($in<=8) {
						$row = mysql_fetch_assoc($result);
						if(isset($row)) {
							echo "<a class='col s2-5 white hoverable item center-align black-text' href='itempage.php?id=".$row['i_id']."'>
									<img src='images/itemimages/".$row['i_id']."/1.jpg' class='responsive-img'>
									<p class='item-name'>".$row['i_name']."</p>
									<p class='item-desc no-margin'>".$row['description']."</p>
									<p class='item-price green-text'>Rs. ".$row['price']."</p>
									<button class='btn-floating btn-large green white-text' id='buy-btn' type='submit' data-id='".$row['i_id']."'>
										<i class='material-icons waves-effect waves-light'>add_shopping_cart</i>
									</button>
								</a>";
						}
						else
							break;
						$in++;
					}
				?>
			</div>

			<div class="col m10 offset-m1 s12 case" id="new-products">
				<p class="col s12 valign-wrapper">
					<a href="clothing.php" class="black-text tooltipped" data-tooltip="Click for more items" data-position="right">
						Clothing<i class="right material-icons small valign">keyboard_arrow_right</i>
					</a>
				</p>
				<?php
					$host = 'localhost';
					$username = 'root';
					$password = '';
					$db_name = 'e_mart';
					$db = @mysql_connect($host,'root','') or die("Unable to Connect to Database");
					$db1= @mysql_select_db($db_name) or die("Unable to select to Database");
					$sql = "SELECT * FROM item NATURAL JOIN v1 WHERE item.category='clothing' AND item.available>=1";
					$sql1="CREATE VIEW v1 AS SELECT i_name,MIN(price) FROM item GROUP BY i_name";
					$sql2="DROP VIEW v1";
					$result1 = mysql_query($sql1) or die("Fail view");
					$result = mysql_query($sql) or die("Fail query");
					$result2=mysql_query($sql2) or die("fail");
					$in=1;
					while($in<=8) {
						$row = mysql_fetch_assoc($result);
						if(isset($row)) {
							echo "<a class='col s2-5 white hoverable item center-align black-text' href='itempage.php?id=".$row['i_id']."'>
									<img src='images/itemimages/".$row['i_id']."/1.jpg' class='responsive-img'>
									<p class='item-name'>".$row['i_name']."</p>
									<p class='item-desc no-margin'>".$row['description']."</p>
									<p class='item-price green-text'>Rs. ".$row['price']."</p>
									<button class='btn-floating btn-large green white-text' id='buy-btn' type='submit' data-id='".$row['i_id']."'>
										<i class='material-icons waves-effect waves-light'>add_shopping_cart</i>
									</button>
								</a>";
						}
						else
							break;
						$in++;
					}
				?>
			</div>

		</div>


	</div>

	<footer class="row lime darken-3">
		<div class="col s8 offset-s2">
			<div class="col m4 section">
				<p class="white-text">Overview</p>
				<ul>
					<li><a href="#">About Us</a></li>
					<!-- <li><a href="#">FAQs</a></li> -->
					<li><a href="#">Terms</a></li>
					<!-- <li><a href="#">Privacy</a></li> -->
				</ul>
			</div>
			<div class="col m4 section">
				<p class="white-text">Account</p>
				<ul>
					<li><a href="login.php">Create Account</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="login.php">Edit </a></li>
				</ul>
			</div>
			<div class="col m4 section">
				<p class="white-text">Address</p>
				<ul>
					<li>IIIT Jabalpur,</li>
					<li>Dumna Airport Road,</li>
					<li>JabalpurS-482005</li>
				</ul>
			</div>
		</div>
		<p class="col s8 offset-s2">Copyright @ PPP</p>
	</footer>
	

</body>
</html>