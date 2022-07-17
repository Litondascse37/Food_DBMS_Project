<?php
session_start();
if($_SESSION['admin_login_status']!="logged in" and ! isset($_SESSION['user_id']) )
header("Location:../index.php");
if(isset($_GET['sign']) and $_GET['sign']=="out"){
$_SESSION['admin_login_status']="loged out";
unset($_SESSION['user_id']);
header("Location:../index.php");
}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>grocery store</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="topnav">
        <a class="active" href="home.php">Home</a>
        <a href="profile.php">Change password</a>
        <a href="addfood.php">AddFood</a>
        <a href="viewfood.php">ViewFood</a>
        <a href="myorder.php">CustomerOrder</a>
        <div class="topnav-right">
          <a href="?sign=out">Logout</a>
        </div>
      </div>
	  <h5 style="color:white; font-size:20px">Today  <?php echo date('D M Y');?></h5>
      <div class="header">
        <h1>Welcome To</h1>
        <p>Admin Page</p>
      </div>
	   <script src="script.js"></script>
</body>
</html>