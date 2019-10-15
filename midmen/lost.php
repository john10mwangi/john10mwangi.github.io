<?php

include_once('db_connect.php');
if (isset($_SESSION['user_id'])!="") {
	Header("Location: index.php");
}
$error=false;
if(isset($_POST["recover"]))
{
	$idno = mysqli_real_escape_string($conn, $_POST['idno']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
  $pwrd = mysqli_real_escape_string($conn, $_POST['pwrd']);
  $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);

  if(strlen($password) < 6 && $password==0) {
    $error = true;
    $password_error = "Password must be a minimum of 6 characters";
  }

  if($password != $pwrd) {
    $error = true;
    $cpassword_error = "Password and confirm password don't match";
  }else {
  	$password=hash('sha1', $password);
  }

	if (!preg_match("/^[0-9]{10}/",$phoneno)) {
	    $error = true;
	    $phone_error = "Please enter a valid phone number (e.g 07*********8)";
	}
	if (!preg_match("/^[0-9]{8}/",$idno)) {
	    $error = true;
	    $id_error = "Please enter a valid identification number (e.g 07*********8)";
		}


		$ans="SELECT COUNT(*) FROM users WHERE id ='$idno' AND phone='$phoneno'";
		$ans1=mysqli_query($conn, $ans);

if (!$error || $ans1!=0) {

	$results = "UPDATE users SET password='$password' WHERE id ='$idno' AND phone='$phoneno'";
	$query = mysqli_query($conn, $results);

	if (!$query) {
		die("PASSWORD RESET FAILED");
	}
	else{
		header("Location: index.php");
	}
}
}
?>
﻿<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> PASSWORD RECOVERY </title>
			<link rel="stylesheet" href="css/mkulima.css">
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
										<p> NOT REGISTERED? <a class="btn btn-default btn-group btn-primary" href= "reg.php" class="link"> CLICK HERE </a></p>

									</li>

								</ul>

							</nav>

						</div>

						<!-- Right column: content -->
						<div class="column2">
              <div id="mydiv" style="color: red; padding-left: 400px; padding-bottom: 5px; padding-top: 0px"></div>
							<img height="260" width="1100" src="pics/logo1.jpg">

			<div class="form">
				<div class="container_in">

					<form method="post" action="" class="input-group form-group form-control">
						<fieldset>
							<legend> ID NUMBER </legend>
				<input type="text" placeholder="Enter ID number" name="idno" />
				<span class="text-danger"><?php if (isset($id_error)) {
					echo $id_error;
				}?></span>
			</br>
      <legend> PHONE NUMBER </legend>
      <input type="tel" placeholder="Enter phone number" name="phoneno" />
			<span class="text-danger"><?php if (isset($phone_error)) {
				echo $phone_error;
			}?></span>
    </br>
				<legend> NEW PASSWORD </legend>
				<input type="password" placeholder="Enter NEW password" name="password" />
				<span class="text-danger"><?php if (isset($password_error)) {
					echo $password_error;
				}?></span>
      </br>
      <legend> RE-TYPE PASSWORD </legend>
      <input type="password" placeholder="Re-enter NEW password" name="pwrd" />
      </br>
    </br>
				<input class="btn btn-default btn-group btn btn-primary btn-success btn:hover"type="submit" name="recover"  value="RESET">
			</fieldset>
			</form>

			</div>

						</div> <!-- Right column>

		</div> <!-- container -->

</body>
</html>
