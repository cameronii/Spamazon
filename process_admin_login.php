<?php
    include('db_key.php');
    
    $email = "";
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass_word = $_POST['password'];
        
        $sql_e = "SELECT * FROM admin WHERE email='$email'";
        $res_e = mysqli_query($dbconnect, $sql_e);
        
        $query = mysqli_query($dbconnect, "SELECT email, password FROM admin
                                                WHERE email='{$email}' ")
           or die (mysqli_error($dbconnect));
        $userInfo=mysqli_fetch_array($query);

    if (mysqli_num_rows($res_e) == 0) {
        $email_error = "Sorry... that is not a valid admin email";
    }else if($pass_word != $userInfo['password']){
        $pass_error = "Sorry... incorrect password";
    }else{
        $_SESSION["admin"] = $email;
        include_once('Header.php');
        echo '<h1>Logged in!</h1>';
        echo '<p>Head on over to the Admin Dashboard!</p>';
        exit();
      }
  }
?>

