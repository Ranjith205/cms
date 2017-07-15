<?php
session_start();
include '../../database/db_config.php';

$task_id = $_POST['task_id'];
$user_name = $_POST['emp_name'];
$task_name = $_POST['task_name'];
$status = $_POST['status'];
$score = $_POST['score'];
echo "test 1";

$sql = "select score from employees where user_name = '$user_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
       	$newScore = $score + $row['score'];
       	$sql = "UPDATE employees set score=$newScore where user_name = '$user_name'";
       	$result = $conn->query($sql);      
}   

//Insert into DB
$query = "UPDATE `tasks` SET task_name='$task_name' , status='$status' WHERE task_id = $task_id";
if (mysqli_query($conn, $query)) {
    echo "Updated successfully";
    header("Location:../alltasks.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
              
$conn->close();            
?>