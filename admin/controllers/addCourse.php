<?php
session_start();
include '../../database/db_config.php';
$course_name = $_GET['course_name'];
$course_fee = $_GET['course_fee'];

//Insert into DB
$query = "INSERT INTO `courses`(course_name,course_fee) values('$course_name','$course_fee')";
if (mysqli_query($conn, $query)) {
    //echo "New record created successfully";
    header("Location:../courses.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>