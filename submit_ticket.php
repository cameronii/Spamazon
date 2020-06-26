<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Customer Support</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
    include_once('Header.php');
    include('db_key.php');
    $email = $_SESSION['email'];
    $details = "";
    $date = date("Y-m-d");
    
    if (isset($_POST['submit_ticket'])) {
        $details = $_POST['details'];
        
            
        $sql_t = "SELECT * FROM tickets WHERE email='$email' AND details='$details'";
        $res_t = mysqli_query($dbconnect, $sql_t);

        if(mysqli_num_rows($res_t) > 0){
            $ticket_error = "That exact ticket has already been submitted";
        }else{
            $sql = "INSERT INTO tickets
            VALUES ('$email', '$details', '$date');";
            $results = mysqli_query($dbconnect, $sql);
            
            echo "<h1>Success!</h1>";
            exit();
        }
    }
?>

<form method="post" action="submit_ticket.php" id="register_form">
    <h1>Submit Customer Support Request</h1>
    <div <?php if (isset($ticket_error)): ?> class="form_error" <?php endif ?> >
        <input type="text" name="details" placeholder="Details" required>
        <?php if (isset($ticket_error)): ?>
        <span><?php echo $ticket_error; ?></span>
        <?php endif ?>
    </div>
    <div>
        <button type="submit" name="submit_ticket" id="reg_btn">Submit Request</button>
    </div>
</form>
</body>
</html>



