<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Spamazon User Registration</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php

include_once('Header.php');
include('process_register.php');
    
?>
    
<form method="post" action="register.php" id="register_form">
    <h1>Register</h1>
    <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
        <label style="color:black;">Username:</label>
        <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
        <?php if (isset($name_error)): ?>
        <span><?php echo $name_error; ?></span>
        <?php endif ?>
    </div>
    <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
        <label style="color:black;">Email:</label>
        <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
        <?php if (isset($email_error)): ?>
        <span><?php echo $email_error; ?></span>
        <?php endif ?>
    </div>
    <div>
        <label style="color:black;">Password:</label>
        <input type="password"  placeholder="Password" name="password" required>
    </div>
    <div>
        <button type="submit" name="register" id="reg_btn">Register</button>
    </div>
</form>
</body>
</html>
