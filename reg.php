<?php
session_start();
if (isset($_SESSION['id'])) {
  Header['Location:sokobuy.php'];
}

include_once 'db_connect.php';

$error=false;
if (isset($_POST['submit'])) {
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $county = mysqli_real_escape_string($conn, $_POST['county']);
  $phone= mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $pwrd = mysqli_real_escape_string($conn, $_POST['pwrd']);
  $id = mysqli_real_escape_string($conn, $_POST['id']);

  //name can contain only alpha characters and space
if (!preg_match("/^[a-zA-Z]+$/",$firstname)) {
  $error = true;
  $firstname_error = "First name can only contain alphabets";
}

if (!preg_match("/^[a-zA-Z]+$/",$lastname)) {
  $error = true;
  $lastname_error = "Last name can only contain alphabets";
}
if (!preg_match("/^[a-zA-Z ]+$/",$county)) {
  $error = true;
  $county_error = "County names can only contain alphabets and spaces";
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $error = true;
  $email_error = "Please enter a valid email address";
}

if (!preg_match("/^[0-9]{10}/",$phone)) {
    $error = true;
    $phone_error = "Please enter a valid phone number (e.g 07*********8)";
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

  $query = "INSERT INTO users( firstname, lastname, county, phone,
   email, password, id, type)
   VALUES('$firstname', '$lastname', '$county', '$phone', '$email', '$password', '$id','farmer')";
	 if (mysqli_query($conn, $query)) {
     echo '<script class="text-success"> alert("REGISTRATION SUCCESSFULL")</script>';
     echo '<script>window.location.href="login.php"</script>';
	 } else {
     	 	echo '<script> alert("REGISTRATION COULD NOT BE SUCCESSFULL")</script>';
	 }

 }
}

?>
<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> REGISTRATION </title>
			<link rel="stylesheet" href="css/mkulima.css">
			<link rel="stylesheet" href="js/css/bootstrap.css">
		  <link rel="stylesheet" href="js/css/bootstrap-theme.css">
</head>


<body>
<div class="mkilima.css/container">

						<div class="column1">

							<nav class="list">

								<h3 class="admin"> REGISTER </h3>

							</nav>

								<ul class="list1">

									<li class="list2">
										<p> Already registered? <a href= "login.php" class="btn btn-default btn-group btn-primary"> CLICK HERE </a></p>
									</li>

								</ul>

						</div>

						<!-- Right column: content -->
						<div class="column2">

              <div id="mydiv" style="color: red; padding-left: 400px; padding-bottom: 20px; padding-top: 10px"></div>
			<div class="title"><h1>FILL YOUR DETAILS</h1></div>


      			<div class="container">
      			<form action="" method='Post'>
              <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
      					<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

      					  <div class="row">
      					    <div class="col-md-5"><legend>FIRST NAME:</legend>
      							<input type="text" placeholder="First Name" name="firstname">
      							<span class="badge btn-danger"><?php if (isset($firstname_error)) {echo $firstname_error;}?></span>
      					</div>
      					    <div class="col-md-7"><legend>LAST NAME:</legend>
      							<input type="text" placeholder="Last Name" name="lastname">
      							<span class="badge btn-danger"><?php if (isset($lastname_error)) {
      								echo $lastname_error;
      							}?></span></div>

      							</div>
      <br><br>
      							<div class="row">
      					    <div class="col-md-5">				<legend>PHONE NUMBER:</legend>
      											<input type="tel" placeholder="07********" name="phone">
      							        <span class="badge btn-danger"><?php
      											if (isset($phone_error)) {
      												echo $phone_error;
      											}
      											?></span></div>
      					    <div class="col-md-7">				<legend> ID NUMBER </legend>
      											<input type="number" placeholder="ID NUMBER" name="id">
      							        <span class="badge btn-danger"><?php if (isset($id_error)) {
      												echo $id_error;
      											}?></span></div>
      					  </div>
      <br><br>
      						<div class="row">
      					    <div class="col-md-5"><legend>PASSWORD:</legend>
      							<input type="password" placeholder="secret" name="password">
      							<span class="badge btn-danger"><?php if (isset($password_error)) {
      								echo $password_error;
      							}?></span></div>
      					    <div class="col-md-7">	<legend>confirm PASSWORD</legend>
      							<input type="password" placeholder="secret" name="pwrd">
      							<span class="badge btn-danger"><?php if (isset($cpassword_error)) {
      							echo $cpassword_error;
      							}?></span></div>
      					  </div>
      <br><br>
      						<div class="row">
      					    <div class="col-md-5">				<legend>EMAIL:</legend>
      											<input type="e-mail" placeholder="email" name="email">
      							        <span class="badge btn-danger"><?php if (isset($email_error)) {
      												echo $email_error;
      											}?></span></div>
      					    <div class="col-md-7">				<legend> COUNTY:</legend>
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
      					  </div>
</br></br>
				<input class="btn btn-primary" type="submit" value="SUBMIT" name='submit'>
			</form>
    </div>
						</div> <!-- Right column>

		</div> <!-- container -->

</body>
</html>
