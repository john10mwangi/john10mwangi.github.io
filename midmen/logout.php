<?php
session_start();
if (isset($_SESSION['user_id'])) {
  echo '<script> alert("YOU HAVE LOGGED OUT OF THE SYSTEM")</script>';
  session_destroy();
  header('location: index.php');
}

?>
