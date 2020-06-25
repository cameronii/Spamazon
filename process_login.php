<?php
    include('db_key.php');
    
    $username = "";
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $pass_word = $_POST['password'];
        
        $sql_u = "SELECT * FROM users WHERE username='$username'";
        $res_u = mysqli_query($dbconnect, $sql_u);
        
        $query = mysqli_query($dbconnect, "SELECT username, password FROM users
                                                WHERE username='{$username}' ")
           or die (mysqli_error($dbconnect));
        $userInfo=mysqli_fetch_array($query);

    if (mysqli_num_rows($res_u) == 0) {
        $name_error = "Sorry... that username does not exist in the database";
    }else if($pass_word != $userInfo['password']){
        $pass_error = "Sorry... incorrect password";
    }else{
        $_SESSION["username"] = $username;
        include_once('Header.php');
        echo '<h1>Logged in!</h1>';
        echo '<p>If this is your first time logging in, please go to the account page to add your customer info</p>';
        exit();
      }
  }
?>
