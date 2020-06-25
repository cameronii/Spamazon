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

    $query = mysqli_query($dbconnect, "SELECT * FROM users
                                            WHERE username='{$_SESSION['username']}' ")
       or die (mysqli_error($dbconnect));
    $userInfo=mysqli_fetch_array($query);
?>
    
<form method="post" action="process_account_update.php" id="register_form">
    <h1 style="color:black;">Update Information</h1>
    <div>
        <label style="color:black;">Address:</label>
        <input type="text" name="address" placeholder="123 Rainbow Rd."
<?php if ($userInfo['address'] != "n/a"): echo "value='{$userInfo['address']}'"; endif ?>  required>
    </div>
    <div>
        <label style="color:black;">Payment Information:</label>
        <input type="text" name="paymentInfo" placeholder="Visa 1234 5678 9101 1121"
<?php if ($userInfo['paymentInfo'] != "n/a"): echo "value='{$userInfo['paymentInfo']}'"; endif ?> required>
    </div>
    <div>
        <button type="submit" name="update" id="reg_btn">Update</button>
    </div>
</form>
</body>
</html>

