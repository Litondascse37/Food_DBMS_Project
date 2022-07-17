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
    <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
          background-color: white;
        }
        
        * {
          box-sizing: border-box;
        }
        
        /* Add padding to containers */
        .container {
          padding: 16px;
          background-color: white;
        }
        
        /* Full-width input fields */
        input[type=text], input[type=password] {
          width: 100%;
          padding: 15px;
          margin: 5px 0 22px 0;
          display: inline-block;
          border: none;
          background: #f1f1f1;
        }
        
        input[type=text]:focus, input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }
        
        /* Overwrite default styles of hr */
        hr {
          border: 1px solid #f1f1f1;
          margin-bottom: 25px;
        }
        
        /* Set a style for the submit button */
        .registerbtn {
          background-color: #04AA6D;
          color: white;
          padding: 16px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
          opacity: 0.9;
        }
        
        .registerbtn:hover {
          opacity: 1;
        }
        
        /* Add a blue text color to links */
        a {
          color: dodgerblue;
        }
        
        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
          background-color: #f1f1f1;
          text-align: center;
        }
        </style>
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
    <form action="cpassword.php" method="post">
        <div class="container">
          <h1>changing password</h1>
          <hr>
          <label for="psw"><b>Old Password</b></label>
          <input type="password" placeholder="Enter old Password" name="opsw" id="opsw" required>
      
          <label for="psw"><b>New Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
      
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="rpsw" id="rpsw" required>
          <hr>
          <button type="submit" class="registerbtn"name="submit">save</button>
        </div>
      </form>
     
</body>
</html>
 <?php
if(isset($_POST['submit']))
{
	include("../connection.php");
	$opsw=$_POST['opsw'];
	$psw=$_POST['psw'];
	$rpsw=$_POST['rpsw'];
	if($psw==$rpsw)
	{
		$sql="select password from registration where password='$opsw'";
		$r=mysqli_query($con,$sql);
		if(mysqli_num_rows($r)>0)
		{
			$sql1="update registration set password='$psw'";
			if(mysqli_query($con,$sql1))
			{
				echo "password changed successfully!";
			}	
		}
		else{
			echo "old password does not match!";
		}
			
	}
	else{
		echo "New password does not match with repeat password!";
	}
}

?>
