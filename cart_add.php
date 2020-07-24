<?php
include('login/database.php');
$id=$_GET['id'];
$user=$_SESSION['user'];
$sql1="SELECT * FROM `product_details` WHERE `id`=$id ";
    					$result=mysqli_query($conn,$sql1);
    					if($result->num_rows > 0){
    						$row=mysqli_fetch_assoc($result);
    						echo $product_name=$row['product_name'];
    						echo $new_price=$row['new_price'];
    					}
    					// die();
$sql="INSERT INTO `cart`(`product_id`, `user`, `status`,`product_name`,`new_price`) VALUES ('$id','$user','Added to cart','$product_name','$new_price')";
$add_to_cart_result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    header('location: shop.php');

?>