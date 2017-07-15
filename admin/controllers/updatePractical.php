<?php
session_start();
include '../../database/db_config.php';
include 'checkEmail.php';
$pract_id = $_GET['pract_id'];
$pract_name = $_GET['pract_name'];
$pract_fee = $_GET['pract_fee'];

//update to DB
$query = "UPDATE `practicals` SET pract_name ='$pract_name',pract_fee ='$pract_fee' WHERE pract_id = $pract_id";
if (mysqli_query($conn, $query)) {
    //echo "New record created successfully";
    header("Location:../practicals.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>