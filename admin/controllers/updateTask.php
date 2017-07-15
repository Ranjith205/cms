<?php
session_start();
include '../../database/db_config.php';

$task_id = $_POST['task_id'];
/*if(isset($_POST['attachment'])){
	$attachments = $_POST['attachment'];
}
else {
	$attachments = "No Attachments";
}*/
$emp_type = $_POST['emp_type'];
$emp_name = $_POST['emp_name'];
$start_date = $_POST['start_date'];
$start_time = $_POST['start_time'];
$task_name = $_POST['task_name'];
$end_date = $_POST['end_date'];
$end_time = $_POST['end_time'];
$status = $_POST['status'];

echo "test 1";
//if(isset($_POST["attachments"]) && !empty($_POST["attachments"])){
if(!empty($_FILES['attachments'])){
	echo "test 2";
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
	$sql = "UPDATE `tasks` SET attachments='$attachments' WHERE task_id = $task_id";
	if (mysqli_query($conn, $sql)) {
	    //echo "New record created successfully";
	    //header("Location:../alltasks.php");
	} else {
	    echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
}


//Insert into DB
$query = "UPDATE `tasks` SET emp_type ='$emp_type',emp_name='$emp_name' ,task_name='$task_name' ,start_date = '$start_date',start_time = '$start_time',end_date='$end_date' , end_time='$end_time' , status='$status' WHERE task_id = $task_id";
if (mysqli_query($conn, $query)) {
    echo "New record created successfully";
    header("Location:../alltasks.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>