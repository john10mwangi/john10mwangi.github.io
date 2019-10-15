<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> agriGOdig Home admin</title>
			<link rel="stylesheet" href="css/mkulima.css">
			<link rel="stylesheet" href="js/css/bootstrap.css">
		  <link rel="stylesheet" href="js/css/bootstrap-theme.css">

</head>


<body>
<div class="css/mkulima.css/container">

							<div class="column1">

								<nav class="list">

									<h3 class="admin"> HOME </h3>

									<ul class="list1">

										<li class="list2">
											<a href="home.php" class="link">HOME</a>
										</li>

									</ul>
									<ul class="list1">

										<li class="list2">
											<a href= "retrieve_prd.php" class="link"> CHANGE PRICES </a>
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
											<a href= "addproduct.php" class="link"> ADD PRODUCTS </a>
										</li>

									</ul>

									<ul class="list1">

										<li class="list2">
											<a href= "reg.php" class="link"> ADD ADMIN </a>
										</li>

									</ul>

									<ul class="list1">

										<li class="list2">
											<a href="retrieve.php" class="link"> RECORDS </a>
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
			<?php
			session_start();
			if(!isset($_SESSION['user_name'])) {
				Header("Location: index.php");
			}

			include_once 'db_connect.php';

			$error=false;
			if (isset($_POST['submit'])) {
			  $username = mysqli_real_escape_string($conn, $_POST['username']);
			  $county = mysqli_real_escape_string($conn, $_POST['county']);
			  $password = mysqli_real_escape_string($conn, $_POST['password']);
			  $pwrd = mysqli_real_escape_string($conn, $_POST['pwrd']);
			  $id = mysqli_real_escape_string($conn, $_POST['id']);

			if (!preg_match("/^[a-zA-Z]+$/",$username)) {
			  $error = true;
			  $username_error = "Last name can only contain alphabets";
			}
			if (!preg_match("/^[a-zA-Z ]+$/",$county)) {
			  $error = true;
			  $county_error = "County names can only contain alphabets and spaces";
			}

			if(strlen($password) < 6) {
			  $error = true;
			  $password_error = "Password must be a minimum of 6 characters";
			}

			if($password != $pwrd) {
			  $error = true;
			  $cpassword_error = "Password and confirm password don't match";
			}else {
				$password=hash('sha1', $password);
			}
			if (!preg_match("/^[0-9]{8}/",$id)) {
			    $error = true;
			    $id_error = "Please enter a valid identification number (e.g 07*********8)";
				}
			if (!$error){

			  $query = "INSERT INTO admin(username, password, county, id)
				VALUES('$username', '$password', '$county', '$id')";
				 if (mysqli_query($conn, $query)) {
			     echo '<script class="text-success"> alert("REGISTRATION SUCCESSFULL")</script>';
			     Header('Location:retrieve.php');
				 } else {
			     	 	echo '<script> alert("REGISTRATION COULD NOT BE SUCCESSFULL")</script>';
				 }

			 }
			}
?>

			      			<div class="container">
			      			<form action="" method='Post'>
			              <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			      					<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

			                						<div class="row">
			                      					    <div class="col-md-5">				<legend> COUNTY:</legend>
			                      											<select name="county" >
			                      												<option value="">---------------</option>
			                      												<option value="mombasa" >Mombasa</option><option value="lamu">Lamu</option>
			                      												<option value="kilifi">Kilifi</option><option value="kwale">Kwale</option>
			                      												<option value="taita taveta">Taita Taveta</option><option value="tana river">Tana River</option>
			                      												<option value="garisa">Garisa</option><option value="wajir">Wajir</option>
			                      												<option value="mandera">Mandera</option><option value="marsabit">Marsabit</option>
			                      												<option value="Embu">Embu</option><option value="isiolo">Isiolo</option>
			                      												<option value="Meru">Meru</option><option value="Tharaka-Nithi">Tharaka-Nithi</option>
			                      												<option value="Kitui">Kitui</option><option value="Laikipia">Laikipia</option>
			                      												<option value="Machakos">Machakos</option><option value="Nakuru">Nakuru</option>
			                      												<option value="Makueni">Makueni</option><option value="Narok">Narok</option>
			                      												<option value="Nyandarwa">Nyandarwa</option><option value="Kajiado">Kajiado</option>
			                      												<option value="Nyeri">Nyeri</option><option value="Kericho">Kericho</option>
			                      												<option value="Kirinyaga">Kirinyaga</option><option value="Bomet">Bomet</option>
			                      												<option value="Muranga">Muranga</option><option value="Kakamega">Kakamega</option>
			                      												<option value="Kiambu">Kiambu</option><option value="Vihiga">Vihiga</option>
			                      												<option value="Turkana">Turkana</option><option value="Bungoma">Bungoma</option>
			                      												<option value="West Pokot">West-Pokot</option><option value="Busia">Busia</option>
			                      												<option value="Samburu">Samburu</option><option value="Siaya">Siaya</option>
			                      												<option value="Trans Nzoia">Trans Nzoia</option><option value="Kisumu">Kisumu</option>
			                      												<option value="Uasin Gishu">Uasin Gishu</option><option value="Homa bay">Homa Bay</option>
			                      												<option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option><option value="Migori">Migori</option>
			                      												<option value="Nandi">Nandi</option><option value="Kisii">Kisii</option>
			                      												<option value="Baringo">Baringo</option><option value="nyamira">Nyamira</option>
			                      												<option value="Nairobi">Nairobi</option>
			                      											</select>
			                      							        <span class="badge btn-danger"><?php if (isset($county_error)) {
			                      												echo $county_error;
			                      											}?></span></div>

			      					    <div class="col-md-5">				<legend> Username </legend>
			      											<input type="text" placeholder="Username" name="username">
			      							        <span class="badge btn-danger"><?php if (isset($username_error)) {
			      												echo $username_error;
			      											}?></span></div>
			      					  </div>
			      <br><br>
			      						<div class="row">
			      					    <div class="col-md-5"><legend>PASSWORD:</legend>
			      							<input type="password" placeholder="secret" name="password">
			      							<span class="badge btn-danger"><?php if (isset($password_error)) {
			      								echo $password_error;
			      							}?></span></div>
			      					    <div class="col-md-5">	<legend>confirm PASSWORD</legend>
			      							<input type="password" placeholder="secret" name="pwrd">
			      							<span class="badge btn-danger"><?php if (isset($cpassword_error)) {
			      							echo $cpassword_error;
			      							}?></span></div>
			      					  </div>
											</br></br>
												<div class="row">
			      					    <div class="col-md-5"><legend> ID NUMBER:</legend>
			      							<input type="text" placeholder="ID NUMBER" name="id">
			      							<span class="badge btn-danger"><?php if (isset($id_error)) {
			      								echo $id_error;
			      							}?></span></div>
												</div>
			      <br><br>
			      					  </div>
			</br></br>
							<input class="btn btn-primary" type="submit" value="SUBMIT" name='submit'>
						</form>
			    </div>
		</div> <!-- container -->

</body>
</html>
