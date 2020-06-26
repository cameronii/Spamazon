<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Spamazon</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
include_once('Header.php');
include('db_key.php');

?>
<h1 align="center">Purchase Orders</h1>
<table border="1" align="center">
<tr>
  <td>Book Number</td>
  <td>Name</td>
  <td>Address</td>
  <td>Card Number</td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT purchase.bookNo, users.userName, users.address, users.paymentInfo FROM purchase 
										INNER JOIN users ON users.email=purchase.email")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><a href='book.php?ID={$row['bookNo']}'>{$row['bookNo']}</td>
    <td>{$row['userName']}</td>
    <td>{$row['address']}</td>
	<td>{$row['paymentInfo']}</td>
   </tr>\n";

}

?>
</table>
</body>
</html>
