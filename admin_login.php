<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Spamazon Admin Login</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    include('process_admin_login.php');
    include_once('Header.php'); ?>

<form method="post" action="admin_login.php" id="register_form">
    <h1 style="color:black;">Admin Login</h1>
    <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
        <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
        <?php if (isset($email_error)): ?>
        <span><?php echo $email_error; ?></span>
        <?php endif ?>
    </div>
    <div <?php if (isset($pass_error)): ?> class="form_error" <?php endif ?> >
        <input type="password"  placeholder="Password" name="password" required>
        <?php if (isset($pass_error)): ?>
        <span><?php echo $pass_error; ?></span>
        <?php endif ?>
    </div>
    <div>
        <button type="submit" name="login" id="reg_btn">Log in</button>
    </div>
</form>
</body>
</html>
