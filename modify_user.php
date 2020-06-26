<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Modify User</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php

    include_once('Header.php');
    include('db_key.php');
    
    if(isset($_POST['modify'])){
        $email = $_POST['email'];
        $paymentInfo = $_POST['paymentInfo'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        
        $sql = "UPDATE users
        SET userName = '{$username}', address = '{$address}', password = '{$password}', paymentInfo = '{$paymentInfo}'
        WHERE email = '{$email}'";
        if ($dbconnect->query($sql) === TRUE) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . $conn->error;
        }
        
    }
    
    if(isset($_POST['select'])){

    $query = mysqli_query($dbconnect, "SELECT * FROM users
                                            WHERE email='{$_POST['email']}' ")
       or die (mysqli_error($dbconnect));
    $userInfo=mysqli_fetch_array($query); ?>
<form method="post" action="modify_user.php" id="register_form">
    <h1 style="color:black;">Modify User Information</h1>
    <input type="hidden" name="email" value=<?php echo "'{$userInfo['email']}'"; ?>>
    <div>
        <label style="color:black;">Name:</label>
<input type="text" name="username" placeholder="John Smith" value=<?php echo "'{$userInfo['userName']}'"; ?>  required>
    </div>
    <div>
        <label style="color:black;">Address:</label>
        <input type="text" name="address" placeholder="123 Rainbow Rd." value=<?php echo "'{$userInfo['address']}'"; ?>  required>
    </div>
    <div>
        <label style="color:black;">Password:</label>
        <input type="text" name="password" placeholder="Password" value=<?php echo "'{$userInfo['password']}'"; ?>  required>
    </div>
    <div>
        <label style="color:black;">Payment Info:</label>
        <input type="text" name="paymentInfo" placeholder="1234 5678 9101 1121" value=<?php echo "'{$userInfo['paymentInfo']}'"; ?>  required>
    </div>
    <div>
        <button type="submit" name="modify" id="reg_btn">Modify</button>
    </div>
</form>
                          
 <?php }else{ ?>
                          
        <form method="post" action="modify_user.php" id="register_form">
            <h1 style="color:black;">Select User</h1>
            <div>
                <label style="color:black;">Email:</label>
                <input type="text" name="email" placeholder="John@Smith.com" required>
            </div>
            <div>
                <button type="submit" name="select" id="reg_btn">Select</button>
            </div>
        </form>
    <?php } ?>
</body>
</html>


