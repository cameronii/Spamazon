<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Rate It</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('db_key.php');

    $query = mysqli_query($dbconnect, " 
		INSERT INTO `review` (`bookNo`, `blurb`, `rating`) VALUES ('".$_GET['ID']."', '".$_GET['blurb']."', '".$_GET['stars']."')")
       or die (mysqli_error($dbconnect));
	echo"<a href='book.php?ID=".$_GET['ID']."'><strong>Item reviewed! Return to item page</strong>"
	?>
</body>
</html>
