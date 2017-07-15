<?php
session_start();
include '../../database/db_config.php';

$emp_type = $_POST['emp_type'];
$emp_name = $_POST['emp_name'];
$start_date = $_POST['start_date'];
$start_time = $_POST['start_time'];
$task_name = $_POST['task_name'];
$end_date = $_POST['end_date'];
$end_time = $_POST['end_time'];
$status = "Pending";

if(!empty($_FILES['attachments'])){
	$target_dir = "uploads/";
	/*$old = basename($_FILES["attachments"]["name"]);
	$imageFileType = pathinfo($target_dir.$old,PATHINFO_EXTENSION);
	echo "Old name ".$old."<br/>";
	$new = $email.'.'.$imageFileType;
	rename($target_dir.$old, $new);*/
	$target_file = $target_dir . basename($_FILES["attachments"]["name"]);
	$attachments = $target_file;
	echo "Target FIle ".$target_file."<br/>";


	//echo "imageFileType  ".$imageFileType."<br/>";

	if (move_uploaded_file($_FILES["attachments"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["attachments"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
}
else{
	$attachments = "no";
}


//Insert into DB
$query = "INSERT INTO `tasks`(emp_type,emp_name,task_name,attachments,start_date,start_time,end_date,end_time,status) 
	values('$emp_type','$emp_name','$task_name','$attachments','$start_date','$start_time','$end_date','$end_time','$status')";
if (mysqli_query($conn, $query)) {
    //echo "New record created successfully";
    header("Location:../alltasks.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>