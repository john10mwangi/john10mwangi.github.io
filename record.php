<?php
session_start();
 ?>
﻿<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> TITLE </title>
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

								<h3 class="admin"> RECORDS </h3>
								<ul class="list1">
									<p><?php echo $_SESSION['user_name'];?>
									</p>
								</ul>

								<h3 class="admin"> SOKO </h3>

								<ul class="list1">

									<li class="list2">
										<a href= "sokobuy.php" class="link"> BUY PRODUCTS </a>
									</br></br>
										<a href= "sokosell.php" class="link"> SELL PRODUCTS </a>
									</li>

								</ul>
								<h3 class="admin"> LOGOUT </h3>
								<ul class="list1">

									<li class="list2">
										<a href="logout.php" class="link">LOG OUT</a>
									</li>

								</ul>

							</nav>

						</div>

						<!-- Right column: content -->
						<div class="column2">

              <div id="mydiv" style="color: red; padding-left: 400px; padding-bottom: 20px; padding-top: 10px"></div>
			<div class="heading"><h1> SALES RECORDS </h1></div>
			<?php
			include_once('db_connect.php');
		if(!isset($_SESSION['user_id'])) {
					header("Location: login.php");
				}
				$Uid=$_SESSION['user_id'];
				$query = "SELECT * FROM market WHERE market.id='$Uid'";
				$query2 = "SELECT * FROM soko WHERE soko.id='$Uid'";
				$res=mysqli_query($conn, $query2);
				$result= mysqli_query($conn, $query);
				if ($result && $res) {
					echo '<div> <table class="data-table" border="1" cellpadding="5">';
					echo '<tr>';
					echo '<th> NAME </th> <th>PRICE</th>  <th>QUANTITY</th>  <th>SALE TYPE</th>  <th>SALE PRICE</th> <th>RECEIPT NUMBER</th>';
					echo '</tr>';

					while ($row = mysqli_fetch_assoc($result)) {
					  extract($row);
					  echo '<tr>';
						echo '<td>',$row['name'],'</td>','<td>',$row['price'],'</td>','<td>',$row['quantity'],'</td>','<td>',$row['saletype'],'</td>','<td>',$row['saleprice'],'</td>','<td>',$row['receipt'].'</td>';
					  echo '</tr>';

					}
					while ($rw=mysqli_fetch_assoc($res)) {
						extract($rw);
					  echo '<tr>';
						echo '<td>',$rw['name'],'</td>','<td>',$rw['price'],'</td>','<td>',$rw['quantity'],'</td>','<td>',$rw['saletype'],'</td>','<td>',$rw['saleprice'],'</td>','<td>',$rw['receipt'].'</td>';
					  echo '</tr>';

					}

				echo '</table>';
				echo '</div>';

			}else {
				echo "problem processing the query";
			}

			?>
		</div> <!-- container -->

</body>
</html>
