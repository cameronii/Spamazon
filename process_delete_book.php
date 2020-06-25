<?php
    include('db_key.php');
    
    if (isset($_POST['delete_book'])) {
        $bookNo = $_POST['bookNo'];
        
        $sql_e = "SELECT * FROM book WHERE bookNo='$bookNo'";
        $res_e = mysqli_query($dbconnect, $sql_e);

    if(mysqli_num_rows($res_e) == 0){
        $bookNo_error = "That bookNo does not exist in the database";
    }else{
        $query = "DELETE FROM book WHERE bookNo={$bookNo}";
        $results = mysqli_query($dbconnect, $query);
        echo "<h1>Success!</h1>";
        exit();
      }
  }
?>

