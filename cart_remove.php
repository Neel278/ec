<?php

include('login/database.php');
$id=$_GET['id'];
$user=$_SESSION['user'];

$sql="DELETE FROM `cart` WHERE `product_id`='$id' AND `user`='$user' ";
$add_to_cart_result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    header('location: cart.php');
?>