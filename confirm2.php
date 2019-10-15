<?php
include_once 'db_connect.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
}


if (isset($_REQUEST['confirm'])) {
  $qns= $_REQUEST['quantity'];
  $HIDDEN = $_REQUEST['name'];
  $prc= $_REQUEST['price'];
  $slp= $_REQUEST['saleprice'];
  extract($slp);
  extract($HIDDEN);
  extract($prc);
  extract($qns);

  $id=$_SESSION['user_id'];
  $slt="sell";

  for ($x=0;$x < count($HIDDEN);$x++) {
    echo '<tr>';
    if ($qns[$x]!=0) {
      $raw=array('id'=>$id, 'name'=>$HIDDEN[$x], 'price'=>$prc[$x], 'quantity'=>$qns[$x],'saletype'=> $slt, 'saleprice'=>$slp[$x],);

      $sql1="INSERT INTO market (id, name, price, quantity, saletype, saleprice,stamp)
      VALUES('$raw[id]', '$raw[name]', '$raw[price]', '$raw[quantity]', '$raw[saletype]', '$raw[saleprice]', CURRENT_TIMESTAMP)";

      if (mysqli_query($conn, $sql1)) {
        echo "<script>alert('success in placing $raw[name] , $raw[quantity]')</script>";
        echo "<script> window.location.href='sokosell.php'</script>";
      } else {
        die("could not add").mysql_error();
      }


    }

    }

}





?>
