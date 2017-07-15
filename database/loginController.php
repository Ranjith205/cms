<?php
session_start();
include 'db_config.php';
$user_name = $_POST['user_name'];
$pwd = md5($_POST['password']);

//echo "Email ".$email." password ".md5($pwd);

//$pwd = md5('admin');
/*$query1 = "insert into  `users`(username,password,role) values('admin','$pwd','admin') ";
$result = mysqli_query($conn,$query1) or die(mysqli_error());*/

$query = "SELECT user_name,password,role FROM `users` WHERE user_name='$user_name' and password='$pwd'";
$result = mysqli_query($conn,$query) or die(mysqli_error());

$count = mysqli_num_rows($result);

if ($count == 1)
{
	$row = $result->fetch_assoc();
	$role = $row['role'];
    $_SESSION['user_name'] = $user_name;
    $_SESSION['role'] = $role;
    getImageURL($user_name);
    if($role == "admin"){
    	echo "Success";
        //saveLogin($user_name);
    	header("Location:../admin/dashboard.php");
    }
    elseif ($role == "Teacher") {
        if(access()){
            echo "Success";
            saveLogin($user_name);
            header("Location:../teacher/dashboard.php");
        }
        else{
            header("Location:../index.php?loginError=You cannot access at this time."); 
            echo "Error";
        }
    }
    elseif ($role == "Computer operator") {
        if(access()){
            echo "Success";
            saveLogin($user_name);
            header("Location:../computer_op/dashboard.php");
        }
        else{
            header("Location:../index.php?loginError=You cannot access at this time."); 
            echo "Error";
        }
    	
    }
    elseif ($role == "Accountant") {
        if(access()){
            echo "Success";
            saveLogin($user_name);
            header("Location:../accountant/dashboard.php");
        }
        else{
            header("Location:../index.php?loginError=You cannot access at this time."); 
            echo "Error";
        }
    	
    }
    elseif ($role == "Student") {
        if(access()){
            echo "Success";
            saveLogin($user_name);
            header("Location:../student/dashboard.php");
        }
        else{
            header("Location:../index.php?loginError=You cannot access at this time."); 
            echo "Error";
        }
    	
    }
    else
	{
	   	header("Location:../index.php?loginError=Invalid user"); 
	    echo "Error";
	}
    
}
else
{
    //$msg="Invalid Login Credentials";
   	header("Location:../index.php?loginError=Incorrect credentials"); 
    echo "Error";
}            
$conn->close();    

function saveLogin($user_name){
    include 'db_config.php';
    date_default_timezone_set('Asia/Kolkata');
    //$date = date('Y-m-d H:i:s');
    $mydate=getdate(date("U"));
    $date = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year] at ".date("h:i:sa");
    $sql = "UPDATE employees SET last_login='$date' where user_name='$user_name'";
    $result = $conn->query($sql);
    $conn->close();
}

function access(){
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date("H");
    if($currentTime>=10 && $currentTime<16){ //Access between 10AM to 4PM
        return TRUE;
    }
    else{
        return TRUE;//change to FALSE after code is been tested
    }
}

function getImageURL($user_name){
    include 'db_config.php';
    $sql = "select image_url from employees where user_name = '$user_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['image_url'] = $row["image_url"]; 
    } 
    $conn->close();
}
?>