<?php
session_start();
include '../../database/db_config.php';

$user_name = $_GET['user_name'];
$emp_type = $_GET['emp_type'];
$emp_name = $_GET['emp_name'];
$gender = $_GET['gender'];
//$image_url = $_GET['image_url'];
$doj = $_GET['doj'];
$subject = $_GET['subject'];
$phone = $_GET['phone'];
$aadhar = $_GET['aadhar'];
$address = $_GET['address'];
$email = $_GET['email'];
//echo "Email ".$emp_id;
//$password = $_GET['password'];
$role = $_GET['role'];

/*if(exists($email,$emp_id)){
	echo "Exists";
	header("Location:../updateemployee.php?updateError=Email already exists");	
}
else{
	echo "Does not exists";
}*/
//Insert into DB
$query = "UPDATE `employees` SET emp_type ='$emp_type',emp_name ='$emp_name',gender = '$gender',doj = '$doj',subject = '$subject',phone = '$phone',aadhar = '$aadhar',address = '$address',email = '$email',role = '$role' WHERE user_name = '$user_name'";
if (mysqli_query($conn, $query)) {
    //echo "New record created successfully";
    header("Location:../allemployee.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>