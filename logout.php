<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Logout</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    session_unset();
    session_destroy();
    include_once('Header.php');
?>
<h1>You have been Logged Out! Thank you for shopping on Spamazon!</h1>
</body>
</html>
