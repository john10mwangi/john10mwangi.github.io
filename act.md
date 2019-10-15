<?php
include_once'db_connect.php';

$error=false;
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

  //name can contain only characters and space
if (!preg_match("/^[a-zA-Z]+$/",$firstname)) {
  $error = true;
  $firstname_error = "First name can only contain alphabets";
}

if (!preg_match("/^[a-zA-Z]+$/",$lastname)) {
  $error = true;
  $lastname_error = "Last name can only contain alphabets";
}

if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
  $error = true;
  $name_error = "Username can only contain alphabets and spaces";
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $error = true;
  $email_error = "Please enter a valid email address";
}

if (!preg_match("/^[0-9]{10}/",$phone)) {
    $error = true;
    $phone_error = "Please enter a valid phone number (e.g 07*********8)";
}

if(strlen($password) < 6) {
  $error = true;
  $password_error = "Password must be a minimum of 6 characters";
}

if($password != $pwrd) {
  $error = true;
  $cpassword_error = "Password and confirm password don't match";
}
if (!$error){

  $query = "INSERT INTO users( firstname, lastname, county, phone,
   email, password, username, id)
   VALUES('$firstname', '$lastname', '$county', '$phone', '$email', '$password',
   '$username', '$id')";
   if (mysqli_query($conn, $query)){
     echo "DATA ADDED";
   }
 }
}
