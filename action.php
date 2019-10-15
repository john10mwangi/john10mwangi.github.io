<?php
include_once "db_connect.php";

if (isset($_POST['submit'])) {
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $county = mysqli_real_escape_string($conn, $_POST['county']);
  $phone= mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $pwrd = mysqli_real_escape_string($conn, $_POST['pwrd']);
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
	//name can contain only alpha characters and space


  $query = "INSERT INTO users( firstname, lastname, county, phone,
   email, password, username, id)
   VALUES('$firstname', '$lastname', '$county', '$phone', '$email', '$password',
   '$username', '$id')";
   if (mysqli_query($conn, $query)){
     echo "DATA SUCCESSFULLY ADDED";
   }
}

?>
