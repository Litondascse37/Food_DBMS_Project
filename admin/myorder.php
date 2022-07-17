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
<?php
include("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>grocery store</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="style3.css">
    


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

<div class="heading">
   <h3>customers orders</h3>
</div>

<section class="placed-orders">

   <h1 class="title"></h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($con, "SELECT * FROM `oder`") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>

</section>









<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>