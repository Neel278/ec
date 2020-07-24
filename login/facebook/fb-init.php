<?php
//session start
session_start();
//include autoload.php from vendor
include("vendor/autoload.php");

$fb=new Facebook\Facebook([
	'app_id' 				=> '1422469187934435',
	'app_secret'			=> 'db7eda4726428a9bf685c1a06c632425',
	'default_graph_version'	=> 'v2.7'
]);

$helper=$fb->getRedirectloginHelper();
$login_url=$helper->getloginUrl("http://localhost/facebook/");

// print_r($login_url);
try {
	
   $accessToken=$helper->getAccessToken();
   if(isset($accessToken)){
   		$_SESSION['access_token'] = (string)$accessToken;	//convert in string

   		header('location:index.php');
   }

} catch (Exception $e) {
	echo $e->getTraceAsString();
}

//now we need some data of user under here....
if(isset($_SESSION['access_token'])){
	try {
		$fb->setDefaultAccessToken($_SESSION['access_token']);
		$res=$fb->get('/me?locale=en_US&fields=name,email');
		$user=$res->getGraphUser();
		echo 'Hello '.$user->getField('name');
	} catch (Exception $e) {
		echo $e->getTraceAsString();
	}
}
?>