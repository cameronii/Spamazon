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
echo "<h1><a href='bio.php?ID={$bookInfo['authorNo']}'>{$bookInfo['authorName']}</a></h1>";
echo "<h1>\${$bookInfo['price']}</h1>";
$today=date("Y-m-d");

if ($today>$bookInfo['publishDate']){
    if (isset($_SESSION['email'])){
	echo"<a href='cart.php?ID={$bookInfo['bookNo']}'><h2>Add to Cart</h2></a>";
	echo"<a href='wishlist.php?ID={$bookInfo['bookNo']}'><h2>Add to Wishlist</h2></a>";
    }
	echo "<h4>Published on {$bookInfo['publishDate']}</h4>";
}
else{
    if (isset($_SESSION['email'])){
	echo"<a href='wishlist.php?ID={$bookInfo['bookNo']}'><h2>Add to Wishlist</h2></a>";
    }
	echo "<h4>Release date {$bookInfo['publishDate']}</h4>";
}

$query = mysqli_query($dbconnect, "SELECT review.blurb, review.rating FROM review 
										WHERE review.bookNo='".$_GET['ID']."' ")
   or die (mysqli_error($dbconnect));
echo"<h2>Reviews</h2>";
if (mysqli_num_rows($query) > 0){

echo "<div class='grid-container' style='grid-template-columns: auto auto;' border='1' align='center'>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<div class='grid-item'>
   <table align='center'>
   <tr><td>Rating: {$row['rating']} star(s)</td></tr>
   <tr><td>{$row['blurb']}</td></tr>
	</table>
   </div>";
}
}
else{
	echo"<h3>No Reviews for this book yet</h3>";
	
	
}

echo" 
</div>
<h2>Write a review for this book</h2>
<form action='rateIt.php' method='GET'>
	<input type='hidden' name='ID' value=".$_GET['ID']." />
        <input type='text' name='blurb' />
		<label for='stars'>Choose a rating:</label>
		<select name='stars' id='stars'>
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
		<option value=4>4</option>
		<option value=5>5</option>
		<input type='submit' value='Rate It' />
		
		</select>
    </form>";
?>
</body>
</html>
