<?php
session_start();
include_once('db_connect.php');

if(isset($_POST["login"]))
{
	$usrnm = mysqli_real_escape_string($conn, $_POST['username1']);
	$pwrd = mysqli_real_escape_string($conn, $_POST['password1']);
	$pwrd=hash('sha1', $pwrd);
	$results = "SELECT * FROM admin WHERE username='$usrnm' AND password='$pwrd'";
	$query = mysqli_query($conn, $results);

	$row=mysqli_fetch_assoc($query);

	if (!$row) {
				echo "<script>alert('ERRORS, INVALID USERNAME OR PASSWORD')</script>";
				echo "<script>window.location.href='index.php'</script>";
	} else {
		$_SESSION['user_name'] = $row['username'];
		$_SESSION['user_county'] = $row['county'];
		$_SESSION['user_id'] = $row['id'];
		header('location: home.php');
	}

}
?>
﻿<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> AGRIgoDIG Admin </title>
			<link rel="stylesheet" href="../css/mkulima.css">
			<link rel="stylesheet" href="js/css/bootstrap.css">
			<link rel="stylesheet" href="js/css/bootstrap-theme.css">
			<link rel="icon" href="pics/logo.png">
</head>


<body>
<div class="mkulima.css/container">

						<div class="column1">

							<nav class="list">
								<h3 class="admin"> LOGIN </h3>
								<ul class="list1">
								<li class="list2">
								<a href= "../help/index.html" class="link"> ABOUT $ HELP </a>
								</li>
								</ul>

								<ul class="list1">

									<li class="list2">
										<a href= "../index.php" class="link"> << BACK HOME << </a>

									</li>

								</ul>

							</nav>

						</div>

						<!-- Right column: content -->
						<div class="column2">
							<div id="mydiv" style="color: red; padding-left: 400px; padding-bottom: 20px; padding-top: 10px"></div>
							<img height="275" width="1100" src="pics/logo1.jpg">
<div class="form">
			<div class="container_in">

									<form method="post" action="" class="input-group form-group form-control">
										<fieldset>
											<legend> USERNAME </legend>
								<input type="text" placeholder="Enter Username" name="username1" />
							</br></br></br>

								<legend> PASSWORD </legend>
								<input type="password" placeholder="Enter password" name="password1" />

							</br></br>
								<input class="btn btn-default btn-group btn btn-primary btn-success btn:hover"type="submit" name="login"  value="LOGIN">
							</fieldset>
							</form>
							<br>
							</div>

						</div> <!-- Right column>
		</div> <!-- container -->

</body>
</html>
