<?php
include('login/database.php');
// $_SESSION['id']=$_GET['id'];
$addId=$_SESSION['addId'];
$_SESSION['address']=$addId;
if(isset($_POST['order'])){
    $firstname=htmlspecialchars($_POST['firstname']);
    $lastname=htmlspecialchars($_POST['lastname']);
    $state=htmlspecialchars($_POST['state']);
    $streetaddress=htmlspecialchars($_POST['streetaddress']);
    $streetaddress1=htmlspecialchars($_POST['streetaddress1']);
    $city=htmlspecialchars($_POST['city']);
    $zip=htmlspecialchars($_POST['zip']);
    $phone=htmlspecialchars($_POST['phone']);
    $email=htmlspecialchars($_POST['email']);
    // $password=md5('$@KL'.$pass.'em@$');
    $sql1="INSERT INTO `address`(`firstname`, `lastname`, `state`, `streetaddress`, `streetaddress1`, `city`, `zip`, `phone`, `email`,`order_id`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt=mysqli_prepare($conn,$sql1);
    if($stmt){
        mysqli_stmt_bind_param($stmt,"ssssssiiss", $firstname,$lastname,$state,$streetaddress,$streetaddress1,$city,$zip,$phone,$email,$_SESSION['address']);
        $row=mysqli_stmt_execute($stmt);
        // $row = mysqli_stmt_fetch($stmt);
        if($row){
            // header("location:index.php");	
            header('location:PaymentGatwayNeel/index.php');
            // echo "string";
        }else{
        	echo "no";
        	// header('location:.php');
            exit();
        	
        }   
    }
}

?>