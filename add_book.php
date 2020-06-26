<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add book</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('process_add_book.php');
    
?>

<form method="post" action="add_book.php" id="register_form">
    <h1>Add Book</h1>
    <div <?php if (isset($bookNo_error)): ?> class="form_error" <?php endif ?> >
        <input type="text" name="bookNo" placeholder="bookNo" required>
        <?php if (isset($bookNo_error)): ?>
        <span><?php echo $bookNo_error; ?></span>
        <?php endif ?>
    </div>
    <div>
        <input type="text" name="title" placeholder="title" value="<?php echo $title; ?>" required>
    </div>
    <div>
        <input type="text" name="price" placeholder="price" value="<?php echo $price; ?>" required>
    </div>
    <div>
        <input type="text" name="subject" placeholder="subject" value="<?php echo $subject; ?>" required>
    </div>
    <div>
        <input type="text" name="publishDate" placeholder="publishDate" value="<?php echo $publishDate; ?>" required>
    </div>
    <div>
        <input type="text" name="ageGroup" placeholder="ageGroup" value="<?php echo $ageGroup; ?>" required>
    </div>
    <div>
        <input type="text" name="authorNo" placeholder="authorNo" value="<?php echo $authorNo; ?>" required>
    </div>
    <div>
        <button type="submit" name="add_book" id="reg_btn">Add Book</button>
    </div>
</form>
</body>
</html>

