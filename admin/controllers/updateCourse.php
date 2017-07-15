<?php
session_start();
include '../../database/db_config.php';
include 'checkEmail.php';
$course_id = $_GET['course_id'];
$course_name = $_GET['course_name'];
$course_fee = $_GET['course_fee'];

//update to DB
$query = "UPDATE `courses` SET course_name ='$course_name',course_fee ='$course_fee' WHERE course_id = $course_id";
if (mysqli_query($conn, $query)) {
    //echo "New record created successfully";
    header("Location:../courses.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>