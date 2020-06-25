<?php
    include('db_key.php');
    
    $username = "";
    $email = "";
    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql_e = "SELECT * FROM users WHERE email='$email'";
        $sql_u = "SELECT * FROM users WHERE username='$username'";
        $res_e = mysqli_query($dbconnect, $sql_e);
        $res_u = mysqli_query($dbconnect, $sql_u);

    if (mysqli_num_rows($res_u) > 0) {
        $name_error = "Sorry... username already taken";
    }else if(mysqli_num_rows($res_e) > 0){
        $email_error = "Sorry... email already taken";
    }else{
        $query = "INSERT INTO users
                VALUES ('$email', '$username', 'n/a', '$password', 'n/a')";
        $results = mysqli_query($dbconnect, $query);
        echo '<h1>Saved!</h1>';
        echo '<p>Go to Log in if you want to Log in</p>';
        exit();
      }
  }
?>
