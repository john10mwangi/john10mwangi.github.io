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
  $place=$_REQUEST['place'];
  extract($slp);
  extract($HIDDEN);
  extract($prc);
  extract($qns);
  extract($place);

  $id=$_SESSION['user_id'];
  $slt="buy";
  if ($qns==0) {
    echo '<script>alert("NO ORDER TO BE PLACED, WOULD YOU REPEAT")</script>';
    header("Location:sokobuy.php");
  } else {

      for ($x=0;$x < count($HIDDEN);$x++) {
        echo '<tr>';
        if ($qns[$x]!=0) {
          $raw=array('id'=>$id, 'name'=>$HIDDEN[$x], 'price'=>$prc[$x], 'new_quantity'=>$qns[$x],'saletype'=> $slt, 'saleprice'=>$slp[$x],'receipt'=>$place[$x]);
          $sql1="INSERT INTO soko (id, name, price, quantity, saletype, saleprice, receipt)
          VALUES('$raw[id]', '$raw[name]', '$raw[price]', '$raw[new_quantity]', '$raw[saletype]', '$raw[saleprice]', '$raw[receipt]')";
          $sqlu="UPDATE market SET quantity=quantity-$raw[new_quantity] WHERE receipt=$raw[receipt]";

          if (mysqli_query($conn, $sql1)) {
            if (mysqli_query($conn, $sqlu)) {
                echo '<script> alert("ORDER PLACED SUCCESSFULL")</script>';
                echo "<script> window.location.href='sokobuy.php'</script>";
            }

          } else {
            die("could not add".mysql_error());
          }


        }

        }

    }
  }







?>
