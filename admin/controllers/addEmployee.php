<?php
session_start();
include '../../database/db_config.php';
$emp_type = $_POST['emp_type'];
$emp_name = $_POST['emp_name'];
$gender = $_POST['gender'];
//$userpic = $_POST['userpic'];
$doj = $_POST['doj'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$aadhar = $_POST['aadhar'];
$address = $_POST['address'];
$email = $_POST['email'];
$user_name = $_POST['user_name'];
$password = md5($_POST['password']);
$role = $_POST['role'];

$target_dir = "userpics/";
$old = basename($_FILES["userpic"]["name"]);
$imageFileType = pathinfo($target_dir.$old,PATHINFO_EXTENSION);
echo "Old name ".$old."<br/>";
$new = $user_name.'.'.$imageFileType;
rename($target_dir.$old, $new);
$target_file = $target_dir . $new;
echo "Target FIle ".$target_file."<br/>";
$uploadOk = 1;

echo "imageFileType  ".$imageFileType."<br/>";

if (move_uploaded_file($_FILES["userpic"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["userpic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }


//Generating employee id
/*$emp_id = 1;
$sql = "select emp_id from employees order by emp_id desc limit 1";
$result = $conn->query($sql);
$emp_id = 1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $emp_id = $row['emp_id']+1;
}*/

//Insert into DB
$query = "INSERT INTO `employees`(user_name,emp_type,emp_name,gender,image_url,doj,subject,phone,aadhar,address,email,password,role) 
    values('$user_name','$emp_type','$emp_name','$gender','$target_file','$doj','$subject','$phone','$aadhar','$address','$email','$password','$role')";
$sql = "INSERT INTO `users`(user_name,password,role) values('$user_name','$password','$role')";
if (mysqli_query($conn, $query) && mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
    header("Location:../allemployee.php");
} else {
	$insertionError = "Error: " . $query. "<br>" . mysqli_error($conn);
    echo $insertionError ;
    header("Location:../allemployee.php?insertionError=$insertionError");
}
              
$conn->close();            
?>