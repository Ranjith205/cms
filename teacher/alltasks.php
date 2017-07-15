<?php include 'controllers/authentication_teacher.php'  ;?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="College Management System">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- App title -->
        <title>Tasks</title>

        <!-- Switchery css -->
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        
          <!-- DataTables -->
        <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        
        
           <!-- Plugins css -->
        <link href="../assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="../assets/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="../assets/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
		<link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        
        
         <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
        <!--Chartist Chart CSS -->
		<link rel="stylesheet" href="../assets/plugins/chartist/dist/chartist.min.css">
        

        <!-- App CSS -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- Modernizr js -->
        <script src="../assets/js/modernizr.min.js"></script>

        

    </head>
 


<body>
    
    <?php include '../inc/top-bar.php';?>

<?php include 'navigation.php';?>

   <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <!-- Large modal -->
                             <!--  <a href="addtask.php">  <button type="button" class="btn btn-primary waves-effect waves-light">New Task</button></a> -->
                           

                        </div>
                        <h4 class="page-title">Tasks</h4>
                    </div>
                </div>
                
                   
              


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12"  style="margin-left:auto; margin-right:auto;">
  
                                    <h4 class="header-title m-t-0"></h4>
                                   
                                    <div class="p-20">
                      
                       <div class="col-sm-12 col-xs-12 col-md-12">
                                    <h4>Current Tasks</h4>
                                   
                                    <div class="p-20">
        
        


                                        
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                     <table id="datatable" class="table table-striped table-bordered">
                                        <thead class="thead-default">
                                            <tr>

                                            <th>S.No</th>
                                            <th>Name</th>
                                                <th>Task</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                 </tr> 
                                            </thead>

                                            <tbody>
                                                <?php 
                                include '../database/db_config.php'; 
                                $user_name = $_SESSION['user_name'];
                                $sql = "SELECT * FROM tasks WHERE emp_name in (select user_name from employees where user_name='$user_name')";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $count = 0;
                                    while($row = $result->fetch_assoc()) {
                                        $count = $count + 1;
                                        $task_id = $row["task_id"];
                                        $emp_name = $row["emp_name"];
                                        $task_name = $row["task_name"];
                                        $start_date = $row['start_date'];
                                        $end_date = $row['end_date'];
                                        $status = $row['status'];
                                        echo "<tr><td>"
                                                .$count."</td><td>"
                                                .$emp_name."</td><td>"
                                                .$task_name."</td><td>";
                                        $date=date_create($start_date);
                                        echo date_format($date,"d/m/Y");
                                        echo "</td><td>";
                                        $date=date_create($end_date);
                                        echo date_format($date,"d/m/Y");
                                        echo "</td>";

                                                if($status == "Pending"){
                                                    echo "<td><span class='label label-danger'>Pending</span></td>";
                                                }
                                                elseif ($status == "in progress") {
                                                    echo "<td><span class='label label-warning'>in progress</span></td>";
                                                }
                                                elseif ($status == "Completed"){
                                                    echo "<td><span class='label label-success'>Completed</span></td>";
                                                }
                                                elseif ($status == "Incomplete"){
                                                    echo "<td><span class='label label-danger'>Not Completed</span></td>";
                                                }

                                              echo "<td width=230>
                                        <a  class='btn btn-primary waves-effect waves-light' href='viewtask.php?task_id=$task_id'>View</a>
                                       
                                        </td></tr>";
                                    }
                                
                                } 
                                $conn->close();
                            ?>

                                            </tbody>

                      
                        <!-- <tr>
                            <td>01</td>
                            <td>Anoop Kumar </td>
                            <td>Notice printout</td>
                            <td>20/02/2014</td>
                            <td>21/02/2020</td>
                            <td><span class="label label-danger">Pending</span></td>
                            <td width=240>
                                <a class="btn btn-success btn-sm" href="viewtask.php">View</a>
							   	&nbsp;
							   	<a class="btn btn-warning btn-sm" href="managetask.php">Manage</a>
							   	&nbsp;
							   	<a class="btn btn-danger btn-sm" href="deletetask.php">Delete</a></td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Surendra Kashyap </td>
                            <td>Website update</td>
                            <td>20/02/2014</td>
                            <td>24/02/2020</td>
                            <td><span class="label label-success">Completed</span></td>
                            <td width=240>
                                <a class="btn btn-success btn-sm" href="viewtask.php">View</a>
							   	&nbsp;
							   	<a class="btn btn-warning btn-sm" href="managetask.php">Manage</a>
							   	&nbsp;
							   	<a class="btn btn-danger btn-sm" href="deletetask.php">Delete</a></td>
                        </tr>
                    <tr>    
                            <td>03</td>
                            <td>Saurabh Singh </td>
                            <td>office paint</td>
                            <td>20/02/2014</td>
                            <td>29/02/2020</td>
                            <td><span class="label label-warning">in progress</span></td>
                        <td width=240>
                                <a class="btn btn-success btn-sm" href="viewtask.php">View</a>
							   	&nbsp;
							   	<a class="btn btn-warning btn-sm" href="managetask.php">Manage</a>
							   	&nbsp;
							   	<a class="btn btn-danger btn-sm" href="deletetask.php">Delete</a></td>
                        </tr>
                    <tr>    <td>04</td>
                            <td>Dr Mukesh kumar </td>
                            <td>Lab material</td>
                            <td>20/02/2014</td>
                            <td>22/02/2020</td>
                            <td><span class="label label-warning">In progress</span></td>
                        <td width=240>
                                <a class="btn btn-success btn-sm" href="viewtask.php">View</a>
							   	&nbsp;
							   	<a class="btn btn-warning btn-sm" href="managetask.php">Manage</a>
							   	&nbsp;
							   	<a class="btn btn-danger btn-sm" href="deletetask.php">Delete</a></td>
                        </tr>
                    <tr>    <td>05</td>
                            <td>Arya kumar </td>
                            <td>Printer Repair</td>
                            <td>15/02/2014</td>
                            <td>19/02/2020</td>
                            <td><span class="label label-success">Completed</span></td>
                        <td width=240>
                                <a class="btn btn-success btn-sm" href="viewtask.php">View</a>
							   	&nbsp;
							   	<a class="btn btn-warning btn-sm" href="managetask.php">Manage</a>
							   	&nbsp;
							   	<a class="btn btn-danger btn-sm" href="deletetask.php">Delete</a></td>
                        </tr> -->
                                        
                
              </table>
                                </div></div>

                            </div>

                        </div>
                    </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end row -->

                    </div><!-- end col-->
                    </div>
                </div>
                <!-- end row -->
                    
    
   <?php include '../inc/footer.php';?>


            </div> <!-- container -->

        </div> <!-- End wrapper -->


 

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>

        <!-- Required datatable js -->
        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables/jszip.min.js"></script>
        <script src="../assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="../assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="../assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>



        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>

    </body>
</html>