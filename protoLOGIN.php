<?php
session_start();
include_once('db_connect.php');

if(isset($_POST["login"]))
{
	$usrnm = mysqli_real_escape_string($conn, $_POST['username1']);
	$pwrd = mysqli_real_escape_string($conn, $_POST['password1']);

	$results = "SELECT username, password FROM users WHERE username='username1' AND password='password1'";
	$query = mysqli_query($conn, $results);
	if (!mysqli_fetch_row($query)) {
		die("ERRORS ERRORS ERRORS");
	} else {
		$errormsg= "incorrect username or password";
	}

}
?>
﻿<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> TITLE </title>
			<link rel="stylesheet" href="css/mkulima.css">
</head>


<body>
<div class="container">

						<div class="column1">

							<nav class="list">
								<h3 class="admin"> LOGIN </h3>

							</nav>

						</div>

						<!-- Right column: content -->
						<div class="column2">
              <div id="mydiv" style="color: red; padding-left: 400px; padding-bottom: 20px; padding-top: 10px"></div>
			<div class="heading"><h1>Login</h1></div>

			<div class="form">
				<form method="post" action="">
			<label> USERNAME
			<input type="text" placeholder="Enter username" name="username1" />
		  </label>
		</br></br></br>

			<label>PASSWORD
			<input type="password" placeholder="Enter password" name="password1" />
			</label>
		</br></br>
			<input type="submit" name="login"  value="LOGIN">
    </li>
	</form>
						</div> <!-- Right column>

		</div> <!-- container -->

</body>
</html>
