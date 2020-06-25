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

    $paymentInfo = $_POST['paymentInfo'];
    $address = $_POST['address'];
    
    $sql_u = "UPDATE users
    SET address = '{$address}', paymentInfo = '{$paymentInfo}'
    WHERE username = '{$_SESSION['username']}'";
    $res_u = mysqli_query($dbconnect, $sql_u);
    
    header('Location: account.php');
    exit();
?>
</body>
</html>
    

