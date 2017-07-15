<?php
include '../../database/db_config.php';
$pract_id = $_GET['q'];
$sql = "DELETE from practicals where pract_id=$pract_id";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "Practical deleted successfully";
} else {
    echo "Error deleting practical: " . $conn->error;
}

$conn->close();
?>