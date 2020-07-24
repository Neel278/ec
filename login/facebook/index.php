<?php
// session_start();
include('fb-init.php');
?>
<?php if(isset($_SESSION['access_token'])){ ?>
	<a href="logout.php">Logout</a>
<?php }else{ ?>
	<a href="<?= $login_url; ?>">Login With Facebook</a>
<?php } ?>	