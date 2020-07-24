<?php
include('login/database.php');
if(isset($_POST['subscribe'])){
$email=$_POST['email'];
$sql="INSERT INTO `newsletter`(`email`) VALUES ('$email')";
$result=mysqli_prepare($conn,$sql) or die(mysqli_error($conn));
header("location:index.php");
}
?>  