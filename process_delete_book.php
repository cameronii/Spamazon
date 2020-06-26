<?php
    include('db_key.php');
    
    if (isset($_POST['delete_book'])) {
        $bookNo = $_POST['bookNo'];
        
        $sql_e = "SELECT * FROM book WHERE bookNo='$bookNo'";
        $res_e = mysqli_query($dbconnect, $sql_e);

    if(mysqli_num_rows($res_e) == 0){
        $bookNo_error = "That bookNo does not exist in the database";
    }else{
        $sql = "DELETE FROM wroteBy WHERE bookNo={$bookNo};";
        $sql .= "DELETE FROM book WHERE bookNo={$bookNo};";

        if ($dbconnect->multi_query($sql) === TRUE) {
          echo "<h1>Success!</h1>";
        } else {
          echo "Error: " . $sql . "<br>" . $dbconnect->error;
        }
        exit();
      }
  }
?>

