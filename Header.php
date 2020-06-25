<!--navbar-->
<nav class="topnav">
    <a href='Frontpage.php'>Home</a>
<?php if(isset($_SESSION['username'])){ ?>
    <a href='account.php'>Account</a>
    <a href='cart.php'>Cart</a>
    <a href='logout.php'>Log out</a>
<?php }else{ ?>
    <a href='register.php'>Register</a>
    <a href='login.php'>Log in</a>
<?php } ?>
</nav>
