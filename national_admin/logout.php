<?php
session_start();
if (isset($_SESSION['user_name'])) {
  echo '<script> alert("YOU HAVE LOGGED OUT OF THE SYSTEM")</script>';
  session_destroy();
  header('location: index.php');
}

?>
