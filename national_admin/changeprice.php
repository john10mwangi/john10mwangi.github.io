<?php
session_start();
if(!isset($_SESSION['user_name'])) {
	Header("Location: index.php");
}
include_once 'db_connect.php';


?>

﻿<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> Admin </title>
			<link rel="stylesheet" href="css/mkulima.css">
</head>


<body>
<div class="container">

									<div class="column1">

										<nav class="list">

											<h3 class="admin"> CHANGE PRICE </h3>

											<ul class="list1">

												<li class="list2">
													<a href="home.php" class="link">HOME</a>
												</li>

											</ul>
											<ul class="list1">

												<li class="list2">
													<a href= "changeprice.php" class="link"> CHANGE PRICES </a>
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
													<a href="retrieve.php" class="link"> records </a>
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
			<form action="action.php" method='Post'>
				<label> NAME
				<input type="text" placeholder="product name" name="username"></label></br></br>
				<label> PRICE
				<input type="number" placeholder="price @ 50kgs" name="id"></label></br></br>
				<input type="submit" value="SUBMIT" name='ADD'>
			</form>
						</div> <!-- Right column>

		</div> <!-- container -->

</body>
</html>
