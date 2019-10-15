<?php

include_once('db_connect.php');
if (isset($_SESSION['user_id'])!="") {
	Header("Location: index.php");
}

if(isset($_POST["login"]))
{
	$idno = mysqli_real_escape_string($conn, $_POST['id']);
	$pwrd = mysqli_real_escape_string($conn, $_POST['pwrd']);

	$pwrd=hash('sha1', $pwrd);



	$results = "SELECT * FROM users WHERE id ='$idno' AND password='$pwrd'AND type='trader'";
	$query = mysqli_query($conn, $results);

	$row=mysqli_fetch_array($query);

	if (!$row) {
		echo "<script>alert('ERRORS, INVALID USERNAME OR PASSWORD')</script>";
		echo "<script>window.location.href='index.php'</script>";
	} else {
		session_start();
		$user_name=$_SESSION['user_name']=$row['firstname'];
		$user_id= $_SESSION['user_id']= $row['id'];
		Header("Location: sokobuy.php");
	}

}
?>
﻿<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> AGRIgoDIG </title>
			<link rel="icon" href="../pics/logo.png">
			<link rel="stylesheet" href="css/mkulima.css">
			<link rel="stylesheet" href="js/css/bootstrap.css">
		  <link rel="stylesheet" href="js/css/bootstrap-theme.css">
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



								<ul class="list1">

									<li class="list2">
										<p> DON'T HAVE AN ACCOUNT? <a class="btn btn-default btn-group btn-primary" href= "reg.php" class="link"> CLICK HERE </a></p>

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
							<legend> ID NUMBER </legend>
				<input type="text" placeholder="Enter ID number" name="id" />
			</br></br></br>

				<legend> PASSWORD </legend>
				<input type="password" placeholder="Enter password" name="pwrd" />

			</br></br>
				<input class="btn btn-default btn-group btn btn-primary btn-success btn:hover"type="submit" name="login"  value="LOGIN">
			</fieldset>
			</form>
			<br>
			<a class="btn btn-primary badge btn:hover btn-link:hover" href="lost.php"> FORGOT PASSWORD</a>
			</div>

						</div> <!-- Right column>

		</div> <!-- container -->

</body>
</html>
