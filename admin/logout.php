<?php

session_start();
session_destroy();
// $_SESSION['signup']=false;
$_SESSION['login']=false;

header("location:index.php");

?>