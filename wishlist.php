<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Wishlist</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('db_key.php');
	if(isset($_GET['ID'])){
	mysqli_query($dbconnect, "INSERT into `wishlist` (`bookNo`, `email`) values('{$_GET['ID']}','{$_SESSION['email']}' )")
	or die (mysqli_error($dbconnect));}
	
    $query = mysqli_query($dbconnect, "SELECT book.title, book.publishDate, wishlist.bookNo, book.price FROM wishlist
INNER JOIN book ON book.bookNo=wishlist.bookNo
WHERE email='{$_SESSION['email']}' ")
       or die (mysqli_error($dbconnect));
	?>
<h1>Wishlist</h1>
<?php
if($query->num_rows === 0){
	echo "</table>";
	echo"<h2>Your Wishlist is Empty</h2>";
}
else
{
echo"	<table border='1' align='center'>
<tr>
  <td>Book Title</td>
  <td>Release Date</td>
  <td>Price</td>
  <td></td>
</tr>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><a href='book.php?ID={$row['bookNo']}'>{$row['title']}</td>
	<td>{$row['publishDate']}</td>
    <td>\${$row['price']}</td>
	<td><a href='removeWish.php?ID={$row['bookNo']}'>remove</td>
   </tr>\n";

}

}
?>



</body>
</html>
