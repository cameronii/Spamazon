<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Remove a Wish</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('db_key.php');

    $query = mysqli_query($dbconnect, " 
		DELETE FROM wishlist 
		WHERE email='{$_SESSION['email']}' AND bookNo='".$_GET['ID']."' 
		ORDER BY bookNo LIMIT 1")
       or die (mysqli_error($dbconnect));
	?>
	<a href='wishlist.php'><strong>Wish Removed! Return to wishlist</strong>
<?php
?>
</body>
</html>
