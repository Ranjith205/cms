<?php
session_start();
if(!isset($_SESSION['user_name'])){
   header("Location:index.php?loginError=Please Login to continue.."); 
   exit;
}
if(isset($_SESSION['role']) && $_SESSION['role'] != "Computer operator"){
	session_start();
	session_destroy();
	header("Location:index.php?loginError=You are not authorised to view this page"); 
   exit;
}
?>
