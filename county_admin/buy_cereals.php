<!DOCTYPE HTML>
<head>
<meta charset="utf-8">

			<title> SELL CEREALS </title>
			<link rel="stylesheet" href="css/mkulima.css">
			<ink ref="stylesheet" href="css/style4.css">
			<link rel="stylesheet" href="css/style1.css">
			<style>
				th {
			background-color: green;
			color: #FFFFFF;
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

								<ul class="list1">

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
																				<a href="retrieve.php" class="link"> RECORDS </a>
																			</li>

																		</ul>

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
										<h2 class="title"> SOKO BUY </h2>
										<table class="data-table "border='0' cellpadding="5">
											<tr>
												<th><a href="sokosell.php">ALL</a></th><th><a href="buy_cereals.php"> CEREALS </a></th><th><a href="buy_vegetables.php"> VEGETABLES </a></th>
												<th><a href="buy_fruits.php"> FRUITS </a></th><th><a href="buy_tubers.php"> TUBERS </a></th>
											</tr>
										</table>
									</header>

									<p>
										<?php
										session_start();
										include_once'db_connect.php';
										if(!isset($_SESSION['user_name'])) {
													header("Location: index.php");
												}
										$query = "SELECT * FROM product WHERE type LIKE 'c%' ";

										$result = mysqli_query($conn, $query) or
										die("COULD NOT EXECUTE QUERY");
										echo '<div class="form"><form method="post" action="sell.php">';
										echo '<div> <table class="data-table "border="1" cellpadding="5">';
										echo '<tr >';
										echo '<th> PRODUCT NAME </th> <th>PRODUCT PRICE</th> <th> QUANTITY </th> ';
										echo '</tr>';
										while ($row = mysqli_fetch_assoc($result)) {
										  extract($row);
										  echo '<tr >';
											$raw=array('<td >','<input type="text" name="name[]" disabled  value=',$row['name'],'>','<input type="HIDDEN" name="nm[]" value=',$row['name'],'>','</td>','<td >','<input name="price[]"
											disabled value=',$row['price'],'>','<input type="HIDDEN" name="pr[]" value=',$row['price'],'>','</td>','<td >','<input type="number" name="quantity[]" placeholder="amount @ 50 KGS"', '</td>');

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
