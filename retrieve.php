<!DOCTYPE html>
<body>
<?php
session_start();
include_once ('db_connect.php');

$query = "SELECT * FROM users ORDER BY tarehe";

$result = mysqli_query($conn, $query) or
die("COULD NOT EXECUTE QUERY");

echo '<div> <table border="1" cellpadding="5">';
echo '<tr>';
echo '<th> FIRSTNAME </th> <th>LASTNAME</th>  <th>ID NUMBER</th>  <th>COUNTY</th>  <th>PHONE NO</th>  <th>E-MAIL</th>';
echo '</tr>';

while ($row = mysqli_fetch_assoc($result)) {
  extract($row);
  echo '<tr>';
  echo '<td>',$row['firstname'],'</td>','<td>',$row['lastname'],'</td>','<td>',$row['id'],'</td>','<td>',$row['county'],'</td>','<td>',$row['phone'],'</td>','<td>',$row['email'], '</td>';
  echo '</tr>';

}
echo '</table>';
echo '</div>';
?>
</body>
</html>
