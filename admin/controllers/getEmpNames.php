 <?php 
include '../../database/db_config.php';
    $emp_type = $_GET['q'];
    $dropdownList= "<select class='form-control' id='exampleSelect2' name='emp_name'>
        <option>Choose</option>";

        $sql = "SELECT user_name,emp_name FROM employees where emp_type='$emp_type'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user_name = $row["user_name"];
                $emp_name = $row["emp_name"];
                $dropdownList =$dropdownList."<option value='".$user_name."'>".$emp_name."</option>";
                
            }
        
        } 
        $conn->close();
    $dropdownList .= "</select>";
    echo $dropdownList;
?>