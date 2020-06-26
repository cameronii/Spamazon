<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Delete user</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php

include_once('Header.php');
include('db_key.php');
    
    if (isset($_POST['delete_user'])) {
        $email = $_POST['email'];
        
        $sql_u = "SELECT * FROM users WHERE email='$email'";
        $res_u = mysqli_query($dbconnect, $sql_u);

    if(mysqli_num_rows($res_u) == 0){
        $email_error = "That email does not exist in the database";
    }else{
        $sql = "DELETE FROM tickets WHERE email='{$email}';";
        $sql .= "DELETE FROM purchase WHERE email='{$email}';";
        $sql .= "DELETE FROM wishlist WHERE email='{$email}';";
        $sql .= "DELETE FROM cart WHERE email='{$email}';";
        $sql .= "DELETE FROM users WHERE email='{$email}';";
        
        
        
        if ($dbconnect->multi_query($sql) === TRUE) {
          echo "<h1>Success!</h1>";
        } else {
          echo "Error: " . $sql . "<br>" . $dbconnect->error;
        }
        exit();
    }
  }
?>
 
<form method="post" action="delete_user.php" id="register_form">
    <h1>Delete User</h1>
    <p style="color: black;" >Warning! Deleting a user will delete all purchase orders, wishlists, carts, and support tickets associated with said user!</p>
    <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
        <input type="text" name="email" placeholder="Email" required>
        <?php if (isset($email_error)): ?>
        <span><?php echo $email_error; ?></span>
        <?php endif ?>
    </div>
    <div>
        <button type="submit" name="delete_user" id="reg_btn">Delete User</button>
    </div>
</form>
</body>
</html>


