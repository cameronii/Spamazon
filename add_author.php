<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Author</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('db_key.php');
    $authorName = "";
    $authorNo = "";
    $bio = "";
    if (isset($_POST['add_author'])) {
        $authorName = $_POST['authorName'];
        $authorNo = $_POST['authorNo'];
        $bio = $_POST['bio'];
        
            
        $sql_a = "SELECT * FROM author WHERE authorNo='$authorNo'";
        $res_a = mysqli_query($dbconnect, $sql_a);

        if(mysqli_num_rows($res_a) > 0){
            $authorNo_error = "That authorNo already exists in the database";
        }else{
            $sql = "INSERT INTO author
            VALUES ('$authorName', '$authorNo', '$bio');";
            $results = mysqli_query($dbconnect, $sql);
            
            echo "<h1>Success!</h1>";
            exit();
        }
    }
?>

<form method="post" action="add_author.php" id="register_form">
    <h1>Add Author</h1>
    <div>
        <input type="text" name="authorName" placeholder="authorName" value="<?php echo $authorName; ?>" required>
    </div>
    <div <?php if (isset($authorNo_error)): ?> class="form_error" <?php endif ?> >
        <input type="text" name="authorNo" placeholder="authorNo" required>
        <?php if (isset($authorNo_error)): ?>
        <span><?php echo $authorNo_error; ?></span>
        <?php endif ?>
    </div>
    <div>
        <input type="text" name="bio" placeholder="bio" value="<?php echo $bio; ?>" required>
    </div>
    <div>
        <button type="submit" name="add_author" id="reg_btn">Add Author</button>
    </div>
</form>
</body>
</html>


