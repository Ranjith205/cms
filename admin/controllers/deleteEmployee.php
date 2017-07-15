<?php
include '../../database/db_config.php';
$user_name = $_GET['q'];
$sql1 = "DELETE from users where user_name in(select user_name from employees where user_name='$user_name')";
$sql = "DELETE from employees where user_name='$user_name'";

/*$result = $conn->query($sql);
$result = $conn->query($sql1);*/
/*if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }*/

if ($conn->query($sql1) === TRUE ) {
	if($conn->query($sql) === TRUE){
    	echo "Record deleted successfully";
	}
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>