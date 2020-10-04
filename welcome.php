<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<style>
body {
  background-image: url('images/1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}



</style>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

    <div class="page-header">
        <h1 style="color:white;" >Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our space observation site.</h1>
    </div>
    <p>
        <a href="down.html" class="btn btn-default">Show me map</a>
    </p>
    <p>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>