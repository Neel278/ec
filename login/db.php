<?php
include('database.php');
// session_start();
if(isset($_POST['login'])){
	$email=htmlspecialchars($_POST['email']);
    $_SESSION['email']=$email;
	$pass=htmlspecialchars($_POST['pass']);
    $password=md5('$@KL'.$pass.'em@$');
    $sql1="SELECT * FROM `signup` WHERE `email`=? AND `password`=?";
    $stmt=mysqli_prepare($conn,$sql1);
    if($stmt){
    	mysqli_stmt_bind_param($stmt,"ss", $email,$password);
        mysqli_stmt_execute($stmt);
    	$row = mysqli_stmt_fetch($stmt);
    	if($row){
            // echo "logged in";
        	$_SESSION['login']=true;
    		header("location:../index.php");
        }else{
            header('location:index.php');
            // echo "something is wrong.";
            exit();   
        }
    }
}elseif(isset($_POST['signup'])){
    $email=htmlspecialchars($_POST['email']);
    $phone=htmlspecialchars($_POST['phone']);
    $dob=htmlspecialchars($_POST['dob']);
    $pass=htmlspecialchars($_POST['pass']);
    $password=md5('$@KL'.$pass.'em@$');
    // var_dump($password);
    // exit();
    $sql1="INSERT INTO `signup`(`email`, `password`, `phone`, `dob`) VALUES (?,?,?,?)";
    $stmt=mysqli_prepare($conn,$sql1);
    if($stmt){
        mysqli_stmt_bind_param($stmt,"ssis", $email,$password,$phone,$dob);
        $row=mysqli_stmt_execute($stmt);
        // $row = mysqli_stmt_fetch($stmt);
        if($row){
            header("location:index.php");
        }else{
            // echo "something is wrong.";
            header('location:signup.php');
            exit();   
        }   
    }
}else{
	header("location:index.php");
    // echo "string"; 
}
?>