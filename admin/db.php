<?php
// error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {
    // $_SESSION['signup']=false;
	$_SESSION['login']=false;
	session_start();
}
$host="localhost";
$user="Neel";
$pass="neel";
$database="event";
$conn=mysqli_connect($host,$user,$pass,$database);
	if(!$conn){
		echo "Unaurthorized connection!!!";
		die();
	}
if(isset($_POST['login'])){
	$email=htmlspecialchars($_POST['username']);
	$pass=htmlspecialchars($_POST['password']);
	$password=sha1('$@NH'.$pass.'em@$');
	// var_dump($password);
	// exit();
	$sql1="SELECT * FROM `event_admin` WHERE `username`=? AND `password`=?";
	$stmt=mysqli_prepare($conn,$sql1);
	if($stmt){
		mysqli_stmt_bind_param($stmt,"ss", $email,$password);
    	mysqli_stmt_execute($stmt);
    	$row = mysqli_stmt_fetch($stmt);
    	if($row){
    		$_SESSION['login']=true;
    		header("location:dash.php");
        }else{  
			header("location:index.php");
			exit();
        }
	}
}
?>