<?php
include '../../database/db_config.php';
/*$sql = "select emp_id from employees order by emp_id desc limit 1";
$result = $conn->query($sql);
$emp_id = 1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $emp_id = $row['emp_id'];
}
echo "Employee Id ".$emp_id;*/
/*date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
echo "Date ".$date;*/

date_default_timezone_set('Asia/Kolkata');
    //$date = date('Y-m-d H:i:s');


    //$mydate=getdate(date("U"));

    //$date = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
    echo "Date ".date("H");
//echo "Deleted Successfully";
?>