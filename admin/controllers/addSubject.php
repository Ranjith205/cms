<?php
session_start();
include '../../database/db_config.php';
$subject_name = $_GET['subject_name'];

//Insert into DB
$query = "INSERT INTO `subjects`(subject_name) values('$subject_name')";
if (mysqli_query($conn, $query)) {
    //echo "New record created successfully";
    header("Location:../subjects.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>