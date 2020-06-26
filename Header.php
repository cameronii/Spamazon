<!--navbar-->
<nav class="topnav">
    <a href='index.php'>Home</a>
<?php if(isset($_SESSION['email'])){ ?>
    <a href='account.php'>Account</a>
    <a href='cart.php'>Cart</a>
    <a href='submit_ticket.php'>Customer Support</a>
    <a href='logout.php'>Log out</a>
<?php }else if(isset($_SESSION['admin'])){ ?>
    <a href='admin.php'>Admin Dashboard</a>
    <a href='logout.php'>Log out</a>
<?php }else{ ?>
    <a href='register.php'>Register</a>
    <a href='login.php'>Log in</a>
    <a href='admin_login.php'>Admin</a>
<?php } ?>
</nav>
