<?php
session_start();

/*date_default_timezone_set('Asia/Kolkata');
$currentTime = date("h");
if($currentTime<10 && $currentTime>4 ){
	header("Location:index.php?loginError=You cannot access at this time."); 
   exit;
}*/

if(!isset($_SESSION['user_name'])){
   header("Location:index.php?loginError=Please Login to continue.."); 
   exit;
}
if(isset($_SESSION['role']) && $_SESSION['role'] != "Accountant"){
	session_start();
	session_destroy();
	header("Location:index.php?loginError=You are not authorised to view this page"); 
   exit;
}
?>
