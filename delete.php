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

    $query = mysqli_query($dbconnect, "DELETE FROM cart 
		WHERE email='{$_SESSION['email']}' AND bookNo='".$_GET['ID']."' ")
       or die (mysqli_error($dbconnect));
	?>
	<a href='cart.php><strong>Item Removed! Return to cart</strong>
<?php

?>
<!-- Mark you said you might want to work on shopping cart, I just made a file so my link in header would go somewhere -->
</body>
</html>
