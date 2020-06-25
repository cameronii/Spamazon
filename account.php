<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Spamazon Account</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('db_key.php');

    $query = mysqli_query($dbconnect, "SELECT * FROM users
                                            WHERE username='{$_SESSION['username']}' ")
       or die (mysqli_error($dbconnect));
    $userInfo=mysqli_fetch_array($query);

echo "<h1>Account Information</h1>
    <h2>Username</h2>
    <p>{$userInfo['userName']}</p>
    <h2>Email</h2>
    <p>{$userInfo['email']}</p>
    <h2>Address</h2>
    <p>{$userInfo['address']}</p>
    <h2>Payment info</h2>
    <p>{$userInfo['paymentInfo']}</p>
    <a href='account_update.php'>Update Account Information</a>";
?>


</body>
</html>
