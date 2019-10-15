<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> TITLE </title>
			<link rel="stylesheet" href="css/mkulima.css">
			<ink ref="stylesheet" href="css/style4.css">
			<link rel="stylesheet" href="css/style1.css">
			<style>
				th {
			background-color: green;
			color: #DAA520;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}
		td {
			color: red;
			border-color: #6ea1cc !important;
			background-color: #006599;
		}


		</style>
</head>


<body>
<div class="container">

						<div class="column1">
							<nav class="list">

																	<h3 class="admin"><?php session_start(); echo $_SESSION['user_name']; ?> </h3>

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

								<section class="sec">

									<header>
										<h2 class="title"> ORDER </h2>
									</header>

									<p>
										<?php
										//session_start();
										include_once'db_connect.php';
										if(!isset($_SESSION['user_name'])) {
													header("Location: index.php");
												}
										//$user_county=$_SESSION['user_county'];
										$query = "SELECT name,price,quantity,receipt FROM market WHERE quantity>0";

										$result = mysqli_query($conn, $query) or
										die("COULD NOT EXECUTE QUERY");
										echo '<div class="form"><form method="post" action="buy.php">';
										echo '<div> <table class="data-table "border="1" cellpadding="5">';
										echo '<tr >';
										echo '<th> PRODUCT NAME </th> <th>PRODUCT PRICE</th> <th> AVAILABLE QUANTITY </th> <th> QUANTITY </th><th> ITEM NUMBER </th> ';
										echo '</tr>';
										while ($row = mysqli_fetch_assoc($result)) {
										  extract($row);
										  echo '<tr >';
											$raw=array(
													'<td >','<input type="text" name="name[]" disabled  value=',$row['name'],'>','<input type="HIDDEN" name="nm[]" value=',$row['name'],'>','</td>',
													'<td >','<input name="price[]" disabled value=',$row['price'],'>','<input type="HIDDEN" name="pr[]" value=',$row['price'],'>','</td>',
													'<td>','<input name="avail[]" disabled value=',$row['quantity'],'>','<input type="HIDDEN" name="available[]" value=',$row['quantity'],'>','</td>',
													'<td >','<input type="number" name="quantity[]" placeholder="amount @ 50 KGS"', '</td>',
													'<td >','<input type="text" name="placed[]" readonly value=',$row['receipt'] ,'>','</td>');

											foreach ($raw as $key => $value) {
												echo $value;
											}
										  echo '</tr>';
										}
										echo '</table>';
										echo '<table class="data-table" width=85.5%>';
										echo '<td> <input class="list2" width=800px class="link" type="submit" name="submit" value="PURCHASE"> </td>';
										echo '</table>';
										echo '</div>';
										echo '</div>';
										echo '</form>';

										?>
									</p>


								</section>

						</div> <!-- Right column>

		</div> <!-- container -->

</body>
</html>
