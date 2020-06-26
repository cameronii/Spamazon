<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Customer Support Tickets</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
include_once('Header.php');
include('db_key.php');

?>

<table border="1" align="center">
<tr>
    <td>Customer Name</td>
    <td>Customer Email</td>
    <td>Details</td>
    <td>Date</td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT users.username, users.email, tickets.details,
                      tickets.date FROM tickets INNER JOIN users ON tickets.email=users.email")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['username']}</td>
    <td>{$row['email']}</td>
    <td>{$row['details']}</td>
    <td>{$row['date']}</td>
   </tr>\n";

}

?>
</table>
</body>
</html>
