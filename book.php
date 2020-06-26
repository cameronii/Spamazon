<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Book Page</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
include_once('Header.php');
include('db_key.php');

$query = mysqli_query($dbconnect, "SELECT book.title, book.price,book.bookNo,book.publishDate, author.authorNo, author.authorName FROM book 
										INNER JOIN wroteBy ON wroteBy.bookNo=book.bookNo
										INNER JOIN author ON author.authorNo=wroteBy.authorNo
										WHERE book.bookNo='".$_GET['ID']."' ")
   or die (mysqli_error($dbconnect));
   
$bookInfo=mysqli_fetch_array($query);

echo "<h1>{$bookInfo['title']}</h1>";
echo "<h1>by</h1>";
echo "<h1>{$bookInfo['authorName']}</h1>";
echo "<h1>\${$bookInfo['price']}</h1>";
$today=date("Y-m-d");
$passed=time() - strtotime($bookInfo['publishDate']);
echo"$passed";
if ($today>$bookInfo['publishDate']){
	echo"<a href='cart.php?ID={$bookInfo['bookNo']}'><h2>Add to Cart</h2></a>";
	echo "<h4>Published on {$bookInfo['publishDate']}</h4>";
}
else{
	echo "<h4>Release date {$bookInfo['publishDate']}</h4>";
}

?>


</body>
</html>
