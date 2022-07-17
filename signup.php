<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="styleup.css">
</head>
<body>
<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="signup.php" enctype="multipart/form-data">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="name" value="">
	</div>
    <div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password">
	</div>
    <div class="input-group">
		<label>Mobileno</label>
		<input type="text" name="mobile">
	</div>
    <div class="input-group">
		<label>Date of birth</label>
		<input type="date" id="dob" name="dob">
	</div>
    <div class="input-group">
		<label>Gender</label>
    </div><div>
		<input type="radio" name="gender" value="male" checked="checked">male
        <input type="radio" name="gender" value="female">female
	</div>
    <div class="input-group">
		<label>picture</label>
		<input type="file" id="image" name="picture" >
	</div>
    <div class="input-group">
		<label>Address</label>
		<input type="text" id="address" name="address">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="reg_user">submit</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['reg_user']))
{
   //to receive value from the input fields
   $username=$_POST['name'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $mobile=$_POST['mobile'];
   $dob=$_POST['dob'];
   $gender=$_POST['gender'];
   $address=$_POST['address'];
   $city=$_POST['address'];
   $num=rand(10,100);
   $cus_id="c-".$num;
   
   //image upload code
   $ext=explode(".",$_FILES['picture']['name']);
   $c=count($ext);
   $ext=$ext[$c-1];
   $date=date("D:M:Y");
   $time=date("h:i:s");
   $picture_name=md5($date.$time.$cus_id);
   $picture=$picture_name.".".$ext;
   
   $query="insert into registration values('$cus_id','$username','$email','$password','$mobile','$dob','$gender','$picture','$address')";
   if(mysqli_query($con,$query))
   {
	   echo "successfully inserted!";
	   if($picture !=null){
		        move_uploaded_file($_FILES['picture']['tmp_name'],"uploadedimage/$picture");
	           }
   }
   else{
	   echo "error!". mysqli_error($con); 
   }
}
?>i