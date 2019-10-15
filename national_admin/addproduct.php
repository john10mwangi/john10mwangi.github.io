<?php

session_start();
if(!isset($_SESSION['user_name'])) {
	Header("Location: index.php");
}
include_once 'db_connect.php';
if (isset($_POST['ADD'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);

	$sql1="INSERT INTO product(name, price, type) VALUES('$name','$price','$type')";
	if (mysqli_query($conn, $sql1)) {
		echo "<script>alert('PRODUCT $name WITH $price AND TYPE $type ADD SUCCESSFULLY ')</script>";
	} else {
		die("no registration occured".mysqli_error());
	}

}


?>

﻿<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> Admin </title>
			<link rel="stylesheet" href="user/css/mkulima.css">
			<link rel="stylesheet" href="css/mkulima.css">
			<link rel="stylesheet" href="css/style1.css">
			<link rel="stylesheet" href="css/style4.css">
			<link rel="stylesheet" href="js/css/bootstrap.css">
			<link rel="stylesheet" href="js/css/bootstrap-theme.css">
			<link rel="icon" href="pics/logo.png">
</head>


<body>
<div class="mkulima.css/container">

							<div class="column1">

								<nav class="list">

									<h3 class="admin"> ADD PRODUCTS </h3>

									<ul class="list1">

										<li class="list2">
											<a href="home.php" class="link">HOME</a>
										</li>

									</ul>
									<ul class="list1">

										<li class="list2">
											<a href= "addproduct.php" class="link"> ADD PRODUCTS </a>
										</li>

									</ul>
									<ul class="list1">

										<li class="list2">
											<a href= "sokosell.php" class="link"> SELL PRODUCTS </a>
										</li>

									</ul>
									<ul class="list1">

										<li class="list2">
											<a href= "sokobuy.php" class="link"> BUY PRODUCTS </a>
										</li>

									</ul>
									<ul class="list1">

										<li class="list2">
											<a href="record.php" class="link"> records </a>
										</li>

									</ul>

									<ul class="list1">

										<li class="list2">
											<a href="logout.php" class="link"><strong> Log Out </strong> </a>
										</li>

									</ul>


								</nav>

							</div>
						<!-- Right column: content -->
						<div class="column2">
              <div id="mydiv" style="color: red; padding-left: 400px; padding-bottom: 20px; padding-top: 10px"></div>
			<div class="heading"><h1> PRODUCT </h1></div>

			<div class="form">
			<form action="addproduct.php" method='Post'>
				<label> NAME
				<input type="text" style="color: white" placeholder="product name" name="name"></label></br></br>
				<label> PRICE
				<input type="decimal" style="color: white" placeholder="price @ 50kgs" name="price"></label></br></br>
				<label> PRODUCT TYPE:
					<select name="type" style="color: black">
						<option value="">---------------</option>
						<option value="vegetables" >vegetables</option>
						<option value="cereals">cereals</option>
						<option value="fruits" >fruits</option>
						<option value="tubers">tubers</option>
					</select>
					</label>
				</br></br>
				<input type="submit" style="color: white" value="SUBMIT" name='ADD'>
			</form>
						</div> <!-- Right column>

		</div> <!-- container -->

</body>
</html>
