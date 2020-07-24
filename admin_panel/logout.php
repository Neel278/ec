<?php

session_destroy();
$_SESSION['login'] = false;
// session_start();
header('location:index.php')

?>