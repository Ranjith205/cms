<?php
session_start();
include '../../database/db_config.php';
$pract_name = $_GET['pract_name'];
$pract_fee = $_GET['pract_fee'];

//Insert into DB
$query = "INSERT INTO `practicals`(pract_name,pract_fee) values('$pract_name','$pract_fee')";
if (mysqli_query($conn, $query)) {
    //echo "New record created successfully";
    header("Location:../practicals.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>