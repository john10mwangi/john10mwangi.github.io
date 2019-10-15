<!DOCTYPE html>
<head>
  <meta charset="utf-8">

  <title> Digital Mkulima-Adminstrator </title>
  <link rel="icon" href="img/5.jpeg" >

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

              <h3 class="admin"> CONFIRM BUYS </h3>

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
session_start();
include_once('db_connect.php');
if(!isset($_SESSION['user_id'])){
  Header("Location: index.php");
}
else {
    $id = $_SESSION['user_id'];
  }

if(isset($_REQUEST['submit'])){
  $quantity= $_REQUEST['quantity'];
  $HIDDEN = $_REQUEST['nm'];
  $price= $_REQUEST['pr'];
  extract($HIDDEN);
  extract($price);
  extract($quantity);

    echo '<div> <table class="data-table "border="1" cellpadding="5">';
    echo '<form method="post" action="confirm2.php">';
    echo '<tr >';
    echo '<th> PRODUCT NAME </th> <th>PRODUCT PRICE</th> <th> QUANTITY </th> <th> SALE PRICE </th>';
    echo '</tr>';

    for ($x=0;$x < count($HIDDEN);$x++) {
      echo '<tr>';
      if ($quantity[$x]!=0) {
        $saleprice = $price[$x]*$quantity[$x];

        $raw=array(
          '<td>','<input type="text" name="name[]"  value=',$HIDDEN[$x],' readonly>','</td>',
        '<td>','<input type="text" name="price[]" value=',$price[$x],' readonly>','</td>',
        '<td>','<input type="text" name="quantity[]"  value=',$quantity[$x],' readonly>','</td>',
        '<td>','<input type="text" name="saleprice[]"  value=',$saleprice,' readonly>','</td>');
        foreach ($raw as $key => $value) {
        echo $value;
      }

      }

      }
      echo '</tr>';
  }


    echo '<tr>';
    echo '<input class="link" type="submit" name="confirm" value="CONFIRM PURCHASE">';
    echo '</tr>';
    echo '</table>';

    echo '</form>';
    echo '</div>';



?>
</body>
</html>
