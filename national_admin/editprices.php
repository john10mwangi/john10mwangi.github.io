<!DOCTYPE html>
<head>
<meta charset="utf-8">

			<title> Admin </title>
			<link rel="stylesheet" href="css/mkulima.css">
			<link rel="stylesheet" href="css/style1.css">
			<link rel="stylesheet" href="css/style4.css">
      <style>

      </style>
</head>
<body>
  <div class="container">

								<div class="column1">

									<nav class="list">

										<h3 class="admin"> CHANGE PRICE </h3>

										<ul class="list1">

											<li class="list2">
												<a href="home.php" class="link">HOME</a>
											</li>

										</ul>
										<ul class="list1">

											<li class="list2">
												<a href= "changeprice.php" class="link"> CHANGE PRICES </a>
											</li>

										</ul>
										<ul class="list1">

											<li class="list2">
												<a href= "addproduct.php" class="link"> ADD PRODUCTS </a>
											</li>

										</ul>
										<ul class="list1">

											<li class="list2">
												<a href= "remove.php" class="link"> REMOVE USER </a>
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
												<a href="retrieve.php" class="link"> records </a>
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
  			<div class="heading"><h1>agriGOdig</h1></div>
				<div class="form">
					<form method="post" action="">
				<label>
				<input type="text" placeholder="PRODUCT NAME" name="name" />
			  </label>
			</br>
			<label>
			<input type="submit" value="SUBMIT" name="submit" />
			</label>
		</br></br>
	</form>
</div>

<?php
session_start();
include_once ('db_connect.php');
if(!isset($_SESSION['user_name'])) {
	Header("Location: index.php");
}

if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($conn, $_POST['name']);


$query = "SELECT * FROM product WHERE name='$name'";

$result = mysqli_query($conn, $query) or
die("COULD NOT EXECUTE QUERY");

echo '<div> <table class="data-table border="1" cellpadding="5">';
echo '<div class="form"> <form method="POST" action="confirm.php">';
echo '<tr>';
echo '<th> PRODUCT NAME </th> <th> CURRENT PRICE</th> <th> NEW PRICE</th>';
echo '</tr>';

while ($row = mysqli_fetch_assoc($result)) {
  extract($row);
  echo '<tr>';
  echo '<td>','<input type="text" name="nm" disabled  value=',$row['name'],'>','<input type="HIDDEN" name="nm" value=',$row['name'],'>','</td>','<td>',$row['price'],'</td>','<td>','<input class ="input" padding=0px type="decimal" name="nwprice" placeholder="NEW PRICE"','</td>';
  echo '</tr>';



}

echo '</table>';
echo '<label><input type="submit" value="CONFIRM" name="confirm" /></label>';
echo '</br></br>';
echo '</form>';
echo '</div>';
echo '</div>';

}
?>
</div>
</body>
</html>
