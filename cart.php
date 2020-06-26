<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cart</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('db_key.php');
	if(isset($_GET['ID'])){
	mysqli_query($dbconnect, "INSERT into `cart` (`bookNo`, `email`) values('{$_GET['ID']}','{$_SESSION['email']}' )")
	or die (mysqli_error($dbconnect));}
	
    $query = mysqli_query($dbconnect, "SELECT book.title, cart.bookNo, book.price FROM cart
INNER JOIN book ON book.bookNo=cart.bookNo
WHERE email='{$_SESSION['email']}' ")
       or die (mysqli_error($dbconnect));
	?>
<h1>Cart Contents</h1>
<?php
if($query->num_rows === 0){
	echo "</table>";
	echo"<h2>Your Cart is Empty</h2>";
}
else
{
echo"	<table border='1' align='center'>
<tr>
  <td>Book Title</td>
  <td>Price</td>
  <td></td>
</tr>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><a href='book.php?ID={$row['bookNo']}'>{$row['title']}</td>
    <td>\${$row['price']}</td>
	<td><a href='removeItem.php?ID={$row['bookNo']}'>remove</td>
   </tr>\n";

}
$query = mysqli_query($dbconnect, "SELECT SUM(book.price) FROM cart
INNER JOIN book ON book.bookNo=cart.bookNo
WHERE email='{$_SESSION['email']}' ")
       or die (mysqli_error($dbconnect));
$result=mysqli_fetch_array($query);
echo"<tr><td><a href='purchase.php'><h3>Purchase</h3></td>";
echo"<td>Total</td>";
echo"<td>{$result['SUM(book.price)']}</td>";
}
?>


<!-- Mark you said you might want to work on shopping cart, I just made a file so my link in header would go somewhere -->
</body>
</html>
