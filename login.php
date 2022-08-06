<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  
  <title>login</title>

  <link rel="stylesheet" type="text/css" href="stylein.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="name" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="signup.php">Sign up</a><br/>
  	</p>
  </form>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['login_user']))
{
	$id=$_POST['name'];
	$pass=$_POST['password'];
	
    $sql="select username,password from admin where username='$id' and password='$pass'"; 
    $sql1="select username,password from registration where username='$id' and password='$pass'";
       	    $r=mysqli_query($con,$sql);
			$r1=mysqli_query($con,$sql1);
			if(mysqli_num_rows($r)>0)
			{
				$_SESSION['user_id']=$id;
				$_SESSION['admin_login_status']="loged in";
				header("Location:admin/home.php");
			}
			
			else if(mysqli_num_rows($r1)>0)
			{
				$_SESSION['user_id']=$id;
				$_SESSION['signup_login_status']="loged in";
				header("Location:signup/home.php");
			}
			
			else
			{
				echo "<p style='color: red;'>Incorrect username or password</p>";
			}
}
?>

