<?php
include('../login/database.php');
if(isset($_POST['login'])){
	$email=htmlspecialchars($_POST['email']);
    $_SESSION['email']=$email;
	$pass=htmlspecialchars($_POST['pass']);
    $password=md5('$@NL'.$pass.'em@$');
    $sql1="SELECT * FROM `ec_admin` WHERE `email`=? AND `pass`=?";
    $stmt=mysqli_prepare($conn,$sql1);
    if($stmt){
    	mysqli_stmt_bind_param($stmt,"ss", $email,$password);
        mysqli_stmt_execute($stmt);
    	$row = mysqli_stmt_fetch($stmt);
    	if($row){
            // echo "logged in";
        	$_SESSION['login']=true;
    		header("location:index.php");
        }else{
            header('location:login.php');
            // echo "something is wrong.";
            exit();   
        }
    }
}elseif(isset($_POST['register'])){
    $email=htmlspecialchars($_POST['email']);
    $firstname=htmlspecialchars($_POST['firstname']);
    $lastname=htmlspecialchars($_POST['lastname']);
    $pass=htmlspecialchars($_POST['pass']);
    $password=md5('$@NL'.$pass.'em@$');
    // var_dump($password);
    // exit();
    $sql1="INSERT INTO `ec_admin`(`firstname`, `lastname`, `email`, `pass`) VALUES (?,?,?,?)";
    $stmt=mysqli_prepare($conn,$sql1);
    if($stmt){
        mysqli_stmt_bind_param($stmt,"ssss", $firstname,$lastname,$email,$password);
        $row=mysqli_stmt_execute($stmt);
        // $row = mysqli_stmt_fetch($stmt);
        if($row){
            header("location:login.php");
        }else{
            // echo "something is wrong.";
            header('location:register.php');
            exit();   
        }   
    }
}else{
	header("location:login.php");
    // echo "string"; 
}

?>