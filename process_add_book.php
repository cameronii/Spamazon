<?php
    include('db_key.php');
    echo "process_add_book start";
    $title = "";
    $price = "";
    $subject = "";
    $publishDate = "";
    $authorNo = "";
    if (isset($_POST['add_book'])) {
        echo "process_add_book entered add scenario";
        $bookNo = $_POST['bookNo'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $subject = $_POST['subject'];
        $publishDate = $_POST['publishDate'];
        $authorNo = $_POST['authorNo'];
        
        $sql_e = "SELECT * FROM book WHERE bookNo='$bookNo'";
        echo $sql_e;
        $res_e = mysqli_query($dbconnect, $sql_e);

    if(mysqli_num_rows($res_e) > 0){
        $bookNo_error = "That bookNo already exists in the database";
        echo $bookNo_error;
    }else{
        echo "insertion time";
        $query = "INSERT INTO book
                VALUES ('$bookNo', '$title', '$price', '$subject', 'publishDate')";
        $results = mysqli_query($dbconnect, $query);
        echo $query;
        $query2 = "INSERT INTO wroteBy
                VALUES ('$bookNo', '$authorNo')";
        $results2 = mysqli_query($dbconnect, $query);
        echo $query2;
        include('Header.php');
        echo "<h1>Success!</h1>";
        exit();
      }
  }
?>

