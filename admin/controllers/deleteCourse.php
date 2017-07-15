<?php
include '../../database/db_config.php';
$course_id = $_GET['q'];
$sql = "DELETE from courses where course_id=$course_id";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "Course deleted successfully";
} else {
    echo "Error deleting course: " . $conn->error;
}

$conn->close();
?>