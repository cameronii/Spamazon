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

<?php
$query = mysqli_query($dbconnect, "SELECT DISTINCT book.subject FROM book")
or die (mysqli_error($dbconnect));
echo "<table align='center'>";
while ($row = mysqli_fetch_array($query)) {
  echo "<td><h3><a href='Category.php?ID={$row['subject']}'>{$row['subject']}</h3></td>";
}

echo "</table>";

if(isset($_GET['ID'])){
$query = mysqli_query($dbconnect, "SELECT book.title, book.price,book.bookNo,author.authorNo, author.authorName FROM book 
										INNER JOIN wroteBy ON wroteBy.bookNo=book.bookNo
										INNER JOIN author ON author.authorNo=wroteBy.authorNo
										WHERE subject='{$_GET['ID']}'")
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
</div>
</body>
</html>
