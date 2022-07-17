<?php
session_start();
if($_SESSION['admin_login_status']!="logged in" and ! isset($_SESSION['user_id']) )
header("Location:../index.php");
if(isset($_GET['sign']) and $_GET['sign']=="out"){
$_SESSION['admin_login_status']="loged out";
unset($_SESSION['user_id']);
header("Location:../index.php");
}
include("../connection.php");
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($con, "DELETE FROM `product` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:viewfood.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:viewfood.php');
      $message[] = 'product could not be deleted';
   };
};	
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
	   <section class="display-product-table">

        <table>
     
           <thead>
              <th>product image</th>
              <th>product name</th>
              <th>product price</th>
              <th>action</th>
           </thead>
     
           <tbody>
            <?php
             include("../connection.php");
            $select_products = mysqli_query($con, "SELECT * FROM `product`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>
     
              <tr>
                 <td><img src="../uploadedimage/<?php echo $row['image']; ?>" height="100" alt=""></td>
                 <td><?php echo $row['name']; ?></td>
                 <td>$<?php echo $row['price']; ?>/-</td>
                 <td>
                    <a href="viewfood.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
                    <a href="updatep.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
                 </td>
              </tr>
			  <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
     
             <div class='empty'>view product added</div>
                
              
           </tbody>
        </table>
     
     </section>
	  <script src="script.js"></script>
</body>
</html>