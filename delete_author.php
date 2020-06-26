<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Delete author</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php

include_once('Header.php');
include('db_key.php');
    
    if (isset($_POST['delete_author'])) {
        $authorNo = $_POST['authorNo'];
        
        $sql_a = "SELECT * FROM author WHERE authorNo='$authorNo'";
        $res_a = mysqli_query($dbconnect, $sql_a);

    if(mysqli_num_rows($res_a) == 0){
        $authorNo_error = "That authorNo does not exist in the database";
    }else{

        $query = mysqli_query($dbconnect, "SELECT book.bookNo FROM book
                                            INNER JOIN wroteBy ON wroteBy.bookNo=book.bookNo
                                            INNER JOIN author ON author.authorNo=wroteBy.authorNo
                              WHERE author.authorNo='{$authorNo}' ")
        or die (mysqli_error($dbconnect));
        $sql = "";
        while ($row = mysqli_fetch_array($query)) {
            $sql .= "DELETE FROM wroteBy WHERE bookNo='{$row['bookNo']}';";
            $sql .= "DELETE FROM book WHERE bookNo='{$row['bookNo']}';";
        }
        $sql .= "DELETE FROM author WHERE authorNo='{$authorNo}';";
        }
        
        
        if ($dbconnect->multi_query($sql) === TRUE) {
          echo "<h1>Success!</h1>";
        } else {
          echo "Error: " . $sql . "<br>" . $dbconnect->error;
        }
        exit();
  }
?>
 
<form method="post" action="delete_author.php" id="register_form">
    <h1>Delete Author</h1>
    <p style="color: black;" >Warning! Deleting an author will delete all books written by said author!</p>
    <div <?php if (isset($authorNo_error)): ?> class="form_error" <?php endif ?> >
        <input type="text" name="authorNo" placeholder="authorNo" required>
        <?php if (isset($authorNo_error)): ?>
        <span><?php echo $authorNo_error; ?></span>
        <?php endif ?>
    </div>
    <div>
        <button type="submit" name="delete_author" id="reg_btn">Delete Author</button>
    </div>
</form>
</body>
</html>

