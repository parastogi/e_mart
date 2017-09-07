<?php
	require_once('php/user_check.php');
	include_once('php/invoice.php');
?>
<!doctype html>
<html>
<head>
	<title>E-Mart</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/loginregistrationstyles.css">
	<link rel="stylesheet" href="css/userstaffstyles.css">
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
			<li><a href="clothing.php">clothing</a></li>
		</ul>
	</div>
	
	<div class="row" id="page">
		
		<div class="row lime  darken-3" id="top-bar">
			<div class="col s12 left">
				<p class="brand-logo col s4 offset-s4 center-align"><a href="index.php" class="white-text">E-Mart</a></p>
			</div>
		</div>

		<div class="row" id="print-container">
			<div id="login" class="col s12 m10 offset-m1 center">
				<p class="center-align"><big><strong>Invoice</strong></big></p>
				<p class="center-align">Customer Name : <?php echo $_SESSION['name']; ?></p>			
				<div class="col m6 s12">
					<p class="center-align">Order Id : <?php echo $_GET['id']; ?></p>
					<p class="center-align">Transaction Id : 64668432</p>
				</div>
				<div class="col m6 s12">
					<p class='green-text' id="total-price">Total Amount : Rs. <?php echo $row1['sum']; ?></p>
				</div>
				<div class="row">
				<?php
					while($row = mysql_fetch_assoc($result)) {
						echo"<div class='col s12 item-card valign-wrapper-custom item_row'>
								<div class='col m1-5 hide-on-small-only item-image'>
									<img src='images/itemimages/". $row['i_id'] ."/1.jpg' class='responsive-img'>
								</div>
								<div class='col  s12 m3-5 item-info'>
									<div class='row'>
										<p class='item-name'>". $row['i_name'] ."</p>
									</div>
								</div>
								<div class='col m2 s12 item-category'>
									<p>". $row['category'] ."</p>
								</div>
								<div class='col m2 s12 seller-info'>
									<p>". $row['s_name'] ."</p>
								</div>
								<div class='col m2 s12 item-price'>
									<p class='green-text'>Rs. ". $row['price'] ."</p>
								</div>
							</div>";
					}
				?>
				</div>
				<button class="btn green waves-effect waves-light" type="button" id="print-button">
					Print<i class="material-icons left">print</i>
				</button>
			</div>
		</div>
	</div>


</body>
</html>