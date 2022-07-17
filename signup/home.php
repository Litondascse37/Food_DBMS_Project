<?php
session_start();
if($_SESSION['signup_login_status']!="logged in" and ! isset($_SESSION['user_id']) )
header("Location:../index.php");
if(isset($_GET['sign']) and $_GET['sign']=="out"){
$_SESSION['signup_login_status']="loged out";
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">

        <div class="flex">
     
           <a href="#" class="logo">foodies</a>
     
           <nav class="navbar">
              <a href="home.php">home</a>
              <a href="profile.php">userprofile</a>
			  <a href="cpassword.php">changepassword</a>
			  <a href="allproduct.php">Shop</a>
           </nav>
         
           <a href="cart.php" class="cart">cart</a>
     
           <div id="menu-btn" class="fas fa-bars"></div>
           <nav class="navbar">
            <a href="?sign=out">Logout</a>
            
         </nav>
     
        </div>
     
     </header>
	 <h5 style="color:black; font-size:20px">Today  <?php echo date('D M Y');?></h5>
	 <br><br>
	 <br><br>
	 <br><br>
      <div>
        <h1 align="center" style="font-size:35px">Welcome To</h1>
        <h2 align="center" style="font-size:50px">Customer Page</h2>
      </div>
     
</body>
</html>