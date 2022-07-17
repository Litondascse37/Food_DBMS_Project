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
    <link rel="stylesheet" type="text/css" href="style2.css">
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
        <section>
        
        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
           <h3>add a new product</h3>
           <input type="text" name="pid" placeholder="enter the product no" class="box" required>
           <input type="text" name="pname" placeholder="enter the product name" class="box" required>
                 <select name="category" class="box" required>
               <option value="" selected disabled>select category</option>
               <option value="vegitables">vegitables</option>
               <option value="fruits">fruits</option>
               <option value="meat">meat</option>
               <option value="fish">fish</option>
         </select>
           <input type="number" name="pprice" min="0" placeholder="enter the product price" class="box" required>
           <input type="file" name="pic" accept="image/png, image/jpg, image/jpeg" class="box" required>
           <input type="submit" value="add the product" name="add_product" class="btn">
        </form>
        
        </section>
         <script src="script.js"></script>  
</body>
</html>
<?php
include("../connection.php");
if(isset($_POST['add_product']))
{
	
	$id=$_POST['pid'];
	$name=$_POST['pname'];
	$category=$_POST['category'];
	$price=$_POST['pprice'];
	
	$ext=explode(".",$_FILES['pic']['name']);
	$c=count($ext);
    $ext=$ext[$c-1];
    $date=date("D:M:Y");
    $time=date("h:i:s");
    $image_name=md5($date.$time.$id);
    $image=$image_name.".".$ext;
	$query="insert into product values('$id','$name','$category','$price','$image')";
    if(mysqli_query($con,$query))
    {
	   //echo "successfully inserted!";
	   if($image !=null){
		        move_uploaded_file($_FILES['pic']['tmp_name'],"../uploadedimage/$image");
				echo "successfully inserted!";
	           }
			   //echo "successfully inserted!";
    }
    else{
	   echo "error!". mysqli_error($con); 
    }
}
?>
	
	
	