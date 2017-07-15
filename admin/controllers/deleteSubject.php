<?php
include '../../database/db_config.php';
$subject_id = $_GET['q'];
$sql = "DELETE from subjects where subject_id=$subject_id";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "Subject deleted successfully";
} else {
    echo "Error deleting course: " . $conn->error;
}

$conn->close();
?>