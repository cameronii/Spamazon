<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Spamazon Admin Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
    <?php include_once('Header.php'); ?>
    
    <h1>Admin Dashboard<h1>
    <h2>What would you like to do?<h2>
    <ul>
        <li><a href="view_tickets.php">View Customer Support Tickets</a></li>
        <li><a href="add_book.php">Add Book</a></li>
        <li><a href="delete_book.php">Delete Book</a></li>
        <li><a href="add_author.php">Add Author</a></li>
        <li><a href="delete_author.php">Delete Author</a></li>
        <li><a href="modify_user.php">Modify a User</a></li>
        <li><a href="delete_user.php">Delete a User</a></li>
    <ul>

</body>
</html>
