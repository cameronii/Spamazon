<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Spamazon</title>
<link rel="stylesheet" type="text/css" href="css/spamstyle.css">
</head>
<body>
<?php
    
include_once('Header.php');
include('db_key.php');

?>
<div>
<h1>Welcome to Spamazon!</h1>
<h3>We sell books with strange nonsensical titles</h3>
</div>




<div class='grid-container' style="grid-template-columns: auto;"border='1' align='center'>
   <div class='grid-item'>
   <a href='search.php'>Search
   </div>
   <div class='grid-item'>
   <a href='Category.php'>Categories
   </div>
   <div class='grid-item'>
   <a href='Age Groups.php'>Age Groups
   </div>
   <div class='grid-item'>
   <a href='New Releases.php'>New Releases
   </div>
   <div class='grid-item'>
   <a href='Coming Soon.php'>Coming Soon
   </div>

</body>
</html>
