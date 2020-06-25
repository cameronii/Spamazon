<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Delete book</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php

include_once('Header.php');
include('process_delete_book.php');
    
?>
 
<form method="post" action="delete_book.php" id="register_form">
    <h1>Delete Book</h1>
    <div <?php if (isset($bookNo_error)): ?> class="form_error" <?php endif ?> >
        <input type="text" name="bookNo" placeholder="bookNo" required>
        <?php if (isset($bookNo_error)): ?>
        <span><?php echo $bookNo_error; ?></span>
        <?php endif ?>
    </div>
    <div>
        <button type="submit" name="delete_book" id="reg_btn">Delete Book</button>
    </div>
</form>
</body>
</html>
