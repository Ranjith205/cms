<?php
session_start();
include '../../database/db_config.php';
include 'checkEmail.php';
$subject_id = $_GET['subject_id'];
$subject_name = $_GET['subject_name'];

//update to DB
$query = "UPDATE `subjects` SET subject_name ='$subject_name' WHERE subject_id = $subject_id";
if (mysqli_query($conn, $query)) {
    //echo "New record created successfully";
    header("Location:../subjects.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>