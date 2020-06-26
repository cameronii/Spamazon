<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Author Page</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
include_once('Header.php');
include('db_key.php');

$query = mysqli_query($dbconnect, "SELECT authorName,bio FROM author
										WHERE authorNo='".$_GET['ID']."' ")
   or die (mysqli_error($dbconnect));
$authorInfo=mysqli_fetch_array($query);

echo "<h1>{$authorInfo['authorName']}</h1>
<h4>{$authorInfo['bio']}</h4>";

?>


<table border="1" align="center">
<tr>
  <td>Book Title</td>
  <td>Price</td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT book.title, book.price,book.bookNo,author.authorNo, author.authorName FROM author 
										INNER JOIN wroteBy ON wroteBy.authorNo=author.authorNo
										INNER JOIN book ON book.bookNo=wroteBy.bookNo
										WHERE author.authorNo='".$_GET['ID']."' ")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td><a href='book.php?ID={$row['bookNo']}'>{$row['title']}</td>
    <td>\${$row['price']}</td>
   </tr>\n";

}

?>
</table>
</body>
</html>
