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
<form action="search.php" method="GET">
        <input type="text" name="search" />
        <input type="submit" value="Search" />
    </form>
<?php


if(isset($_GET['search'])){
$search = $_GET['search'];
echo"Results";	
$query = mysqli_query($dbconnect, "(SELECT book.bookNo,book.title, author.authorNo,author.authorName, book.price FROM book 
									INNER JOIN wroteBy ON wroteBy.bookNo=book.bookNo
									INNER JOIN author ON author.authorNo=wroteBy.authorNo
									WHERE book.title LIKE '%$search%' OR book.subject LIKE '%$search%')

									UNION

									(SELECT book.bookNo,book.title, author.authorNo, author.authorName, book.price FROM author 
									INNER JOIN wroteBy ON wroteBy.authorNo=author.authorNo
									INNER JOIN book ON book.bookNo=wroteBy.bookNo
									WHERE author.authorName LIKE '%$search%');")
or die (mysqli_error($dbconnect));

echo "<div class='grid-container' border='1' align='center'>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<div class='grid-item'>
   <table align='center'>
   <tr><td><a href='book.php?ID={$row['bookNo']}'>{$row['title']}</td></tr>
   <tr><td>by</td></tr>
   <tr><td><a href='bio.php?ID={$row['authorNo']}'>{$row['authorName']}</td></tr>
   <tr><td>\${$row['price']}</td></tr>
	</table>
   </div>";
}
}

?>
</table>
</body>
</html>
