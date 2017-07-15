<?php
session_start();
include '../../database/db_config.php';


$emp_type = $_POST['emp_type'];
$user_name = $_POST['emp_name'];
$pwd = md5($_POST['cpwd']);

//Insert into DB
$query = "UPDATE `employees` SET password = '$pwd' WHERE user_name = '$user_name'";
$sql  = "UPDATE `users` SET password = '$pwd' WHERE user_name = '$user_name'";
if ((mysqli_query($conn, $query)) && (mysqli_query($conn, $sql))) {

    echo "Password Changed successfully";
    header("Location:../dashboard.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>