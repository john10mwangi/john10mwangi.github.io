<?php
define('DBHOST', "localhost");
define('DBPASS', '');
define('DBNAME', 'mkulima');
define('DBUSER', 'root');
$conn=mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if(!$conn){
  die("ERROR IN connection, ".mysql_error());
}

?>
