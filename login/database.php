<?php
// error_reporting(0);

// if (session_status() == PHP_SESSION_NONE) {
session_start();
$host="localhost";
$user="root";
$pass="";
$database="event";
$conn=mysqli_connect($host,$user,$pass,$database);
	if(!$conn){
		echo "Unaurthorized connection!!!";
		die();
	}//else{
	// 	$_SESSION['login']=true;
	// }
?>