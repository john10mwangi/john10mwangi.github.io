<?php
session_start();
$user_name=$_SESSION['user_name']
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">

  <title>

  </title>
  <link rel="icon" href="img/5.jpeg" >
  <link rel="stylesheet" href="js/css/bootstrap.css">
  <link rel="stylesheet" href="js/css/bootstrap-theme.css">
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
  <div class="mkulima.css/container">

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
                  <h2 class="title">SALE CONFIRMATION </h2>
                </header>

<?php
include_once('db_connect.php');
if(!isset($_SESSION['user_name'])){
  Header("Location: index.php");
}
if(isset($_REQUEST['submit'])){
  $quantity= $_REQUEST['quantity'];
  $HIDDEN = $_REQUEST['nm'];
  $price= $_REQUEST['pr'];
  $available=$_REQUEST['available'];
  $placed=$_REQUEST['placed'];

  extract($available);
  extract($HIDDEN);
  extract($price);
  extract($quantity);
  extract($placed);

    echo '<div> <table class="data-table "border="1" cellpadding="5">';
    echo '<form method="post" action="confirm.php">';
    echo '<tr >';
    echo '<th> PRODUCT NAME </th> <th>PRODUCT PRICE</th> <th> QUANTITY </th> <th> SALE PRICE </th>';
    echo '</tr>';

    for ($x=0;$x < count($HIDDEN);$x++) {
      echo '<tr>';
    if ($quantity[$x]!=0 && $quantity[$x] <= $available[$x]) {

              $saleprice = $price[$x]*$quantity[$x];

                $raw=array(
                  '<td>','<input type="text" name="name[]"  value=',$HIDDEN[$x],' readonly>','</td>',
                '<td>','<input type="text" name="price[]" value=',$price[$x],' readonly>','</td>',
                '<td>','<input type="text" name="quantity[]"  value=',$quantity[$x],' readonly>','</td>',
                '<td>','<input type="text" name="saleprice[]"  value=',$saleprice,' readonly>','</td>',
                '<td>','<input type="text" name="place[]"  value=',$placed[$x],' >','</td>');
                foreach ($raw as $key => $value) {
                echo $value;
    }




        }




        echo '</tr>';
    }

      echo '</table>';
      echo "</br>";
      echo '<tr>';
      echo '<input class="link" type="submit" name="confirm" value="CONFIRM ORDER">';
      echo '</tr>';
      echo '<tr>';
      echo '<input class="btn btn-default btn-group btn-primary" type="submit" name="add" value="ADD ITEMS">';
      echo '</tr>';
      echo '</form>';
      echo '</div>';
      echo '</div>';

    }




?>
</div>
</body>
</html>
