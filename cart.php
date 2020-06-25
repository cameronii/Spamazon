<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Spamazon Account Update</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('db_key.php');

    $query = mysqli_query($dbconnect, "SELECT book.title, cart.bookNo, book.price FROM cart
INNER JOIN book ON book.bookNo=cart.bookNo
WHERE email='{$_SESSION['email']}' ")
       or die (mysqli_error($dbconnect));
	?>
	<h1>Cart Contents</h1>
<?php
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><a href='book.php?ID={$row['bookNo']}'>{$row['title']}</td>
    <td>\${$row['price']}</td>
	<td><a href='delete.php?id={$row['bookNo']}.&email={$_SESSION['email']}'></a>remove</td>
   </tr>\n";

}
?>
<!-- Mark you said you might want to work on shopping cart, I just made a file so my link in header would go somewhere -->
</body>
</html>
