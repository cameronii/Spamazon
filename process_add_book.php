<?php
    include('db_key.php');
    $title = "";
    $price = "";
    $subject = "";
    $publishDate = "";
    $authorNo = "";
    $ageGroup = "";
    if (isset($_POST['add_book'])) {
        $bookNo = $_POST['bookNo'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $subject = $_POST['subject'];
        $publishDate = $_POST['publishDate'];
        $ageGroup = $_POST['ageGroup'];
        $authorNo = $_POST['authorNo'];
        
        $sql_e = "SELECT * FROM book WHERE bookNo='$bookNo'";
        $res_e = mysqli_query($dbconnect, $sql_e);

    if(mysqli_num_rows($res_e) > 0){
        $bookNo_error = "That bookNo already exists in the database";
    }else{
        $sql = "INSERT INTO book
        VALUES ('$bookNo', '$title', '$price', '$subject', '$publishDate', '$ageGroup');";
        $sql .= "INSERT INTO wroteBy
        VALUES ('$bookNo', '$authorNo');";

        if ($dbconnect->multi_query($sql) === TRUE) {
          echo "<h1>Success!</h1>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        exit();
      }
  }
?>

