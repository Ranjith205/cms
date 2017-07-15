<?php
include '../../database/db_config.php';
$task_id = $_GET['q'];
$sql = "DELETE from tasks where task_id=$task_id";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>