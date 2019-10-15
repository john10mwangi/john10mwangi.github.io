<!DOCTYPE html>
<head>
<meta charset="utf-8">
			<title> Admin </title>
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

										<h3 class="admin"> USERS RECORDS </h3>

										<ul class="list1">

											<li class="list2">
												<a href="home.php" class="link">HOME</a>
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
												<a href="logout.php" class="link"><strong> Log Out </strong> </a>
											</li>

										</ul>


									</nav>

								</div>
  						<!-- Right column: content -->
  						<div class="column2">

								<table class="">
									<tr class="btn-sm">
										<th><a href="" class="btn disabled"> COUNTY ADMIN </a></th>
										<th><a class="btn active" href="record.php"> SALES </a></th>
										<th><a class="btn active" href="retrieve_trd.php"> TRADERS </a></th>
									  <th><a class="btn active" href="retrieve_prd.php">PRODUCTS</a></th>
									</tr>
								</table>
                <div id="mydiv" style="color: red; padding-left: 400px; padding-bottom: 20px; padding-top: 10px"></div>
  			<div class="heading"><h1>agriGOdig</h1></div>

<?php
include_once ('db_connect.php');
session_start();
if(!isset($_SESSION['user_name'])) {
	Header("Location: index.php");
}
$query = "SELECT * FROM admin";

$result = mysqli_query($conn, $query) or
die("COULD NOT EXECUTE QUERY");
echo '<div> <table class="data-table border="1" cellpadding="5">';
echo '<tr>';
echo '<th> USERNAME </th> <th>COUNTY</th>  <th>IDENTITY NO</th>';
echo '</tr>';
$x=0;
while ($row = mysqli_fetch_assoc($result)) {
  extract($row);
  echo '<tr>';
echo '<td>',$row['username'],'</td>','<td>',$row['county'],'</td>','<td>',$row['id'],'</td>';
  echo '</tr>';
  $x++;


}

echo '</table>';
echo '</br>';
echo '<textarea name="comments" rows="2" cols="21">';
echo "THE TOTAL NUMBER OF USERS:  ";
echo $x;
echo '</textarea>';
echo '</div>';

?>
</div>

</body>
</html>
