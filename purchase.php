<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Purchase</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('db_key.php');
	$query = mysqli_query($dbconnect, "INSERT INTO purchase 
	Select * FROM cart 
	WHERE email='{$_SESSION['email']}'")
       or die (mysqli_error($dbconnect));

	   
	
    $query = mysqli_query($dbconnect, "DELETE FROM cart 
		WHERE email='{$_SESSION['email']}'")
       or die (mysqli_error($dbconnect));
	?>
	<a href='index.php'><strong>Items Purchased! Return to frontpage</strong>
<?php
?>
<!-- Mark you said you might want to work on shopping cart, I just made a file so my link in header would go somewhere -->
</body>
</html>
