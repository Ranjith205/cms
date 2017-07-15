<?php

$user_name = $_GET['q'];
if(exists($user_name)){
	echo "yes";
}
else{
	echo "no";
}


function exists($user_name)
{
	include '../../database/db_config.php';
	$sql = "select user_name from employees where user_name='$user_name'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	    
	    return true;
	}
	else{
		return false;
	}
	$conn->close();
}


?>