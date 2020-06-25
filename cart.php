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
    $cartcontents=mysqli_fetch_array($query);
	?>
	<h1>Cart Contents</h1>
<?php
while ($cartcontents = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><a href='book.php?ID={$row['bookNo']}'>{$row['title']}</td>
    <td>\${$row['price']}</td>
   </tr>\n";

}
?>
<!-- Mark you said you might want to work on shopping cart, I just made a file so my link in header would go somewhere -->
</body>
</html>
