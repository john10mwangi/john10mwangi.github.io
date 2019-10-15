<?php

session_start();

include_once 'db_connect.php';


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

								<h3 class="admin"> REGISTER </h3>
							</nav>

						</div>

						<!-- Right column: content -->
						<div class="column2">
              <div id="mydiv" style="color: red; padding-left: 400px; padding-bottom: 20px; padding-top: 10px"></div>
			<div class="heading"><h1>FILL YOUR DETAILS</h1></div>

			<div class="form">
			<form action="action.php" method='Post'>
				<label>FIRST NAME:
				<input type="text" placeholder="First Name" name="firstname"> </label> </br></br>
				<label>LAST NAME:
				<input type="text" placeholder="Last Name" name="lastname"></label></br></br>
				<label>PASSWORD:
				<input type="password" placeholder="secret" name="password"></label></br></br>
				<label>confirm PASSWORD
				<input type="password" placeholder="secret" name="pwrd"></br></label></br>
				<label>EMAIL:
				<input type="e-mail" placeholder="email" name="email"></label></br></br>
				<label>PHONE NUMBER:
				<input type="tel" placeholder="phone number" name="phone"></label></br></br>
				<label> COUNTY:</label>
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
					<option value="Uasin GIshu">Uasin Gishu</option><option value="Homa bay">Homa Bay</option>
					<option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option><option value="Migori">Migori</option>
					<option value="Nandi">Nandi</option><option value="Kisii">Kisii</option>
					<option value="Baringo">Baringo</option><option value="nyamira">Nyamira</option>
					<option value="Nairobi">Nairobi</option>
				</select></label></br></br>
				<label> USERNAME
				<input type="text" placeholder="USERNAME" name="username"></label></br></br>
				<label> ID NUMBER
				<input type="number" placeholder="ID NUMBER" name="id"></label></br></br>
				<input type="submit" value="SUBMIT" name='submit'>
			</form>
						</div> <!-- Right column>

		</div> <!-- container -->

</body>
</html>
