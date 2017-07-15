<?php 
include 'controllers/authentication_co.php' ;

$task_id = $_GET['task_id']; 

include '../database/db_config.php'; 

/*echo "Emp id ".$emp_id;*/
$sql = "SELECT * FROM tasks WHERE task_id = $task_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emp_name = $row["emp_name"];
        $emp_type = $row["emp_type"];
        $task_name = $row["task_name"];
        $start_date = $row['start_date'];
        $start_time = $row['start_time'];
        $end_date = $row['end_date'];
        $end_time = $row['end_time'];
        $status = $row['status'];
        $attachments = $row['attachments'];
} 
$conn->close();
                                        

?>

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
                      
                       <div class="col-sm-6 col-xs-12 col-md-12">
                                    <h4> Task Details</h4>
                                   
                                    <div class="p-20">


                                    <!-- <dl class="dl-horizontal row">
                                          <dt class="col-sm-3">Department</dt>
                                          <dd class="col-sm-9">General Staff</dd>

                                          <dt class="col-sm-3">Employee Name</dt>
                                          <dd class="col-sm-9">Vinod Mishra</dd>
                                         

                                          <dt class="col-sm-3">Start Date</dt>
                                          <dd class="col-sm-9">29-04-2017</dd>

                                          <dt class="col-sm-3 text-truncate">Time</dt>
                                          <dd class="col-sm-9">9:30 am</dd>
                                               <dt class="col-sm-3">Task</dt>
                                          <dd class="col-sm-9">Please look into the website of university and check all the notices. The same needs to be printed,verified and signed from the concerned department.</dd>
                                               <dt class="col-sm-3">Attachments if any</dt>
                                          <dd class="col-sm-9">No attachments</dd>
                                               <dt class="col-sm-3">Deadline Date</dt>
                                          <dd class="col-sm-9">02-05-2017</dd>
                                               <dt class="col-sm-3">Deadline time</dt>
                                          <dd class="col-sm-9">10:40  am</dd>
                                    </dl> -->
                                    <dl class="dl-horizontal row">
                                          <dt class="col-sm-3">Department</dt>
                                          <dd class="col-sm-9"><?php echo $emp_type; ?></dd>

                                          <dt class="col-sm-3">Employee Name</dt>
                                          <dd class="col-sm-9"><?php echo $emp_name; ?></dd>
                                         

                                          <dt class="col-sm-3">Start Date</dt>
                                          <dd class="col-sm-9"><?php echo $start_date; ?></dd>

                                          <dt class="col-sm-3 text-truncate">Time</dt>
                                          <dd class="col-sm-9"><?php echo $start_time; ?></dd>
                                               <dt class="col-sm-3">Task</dt>
                                          <dd class="col-sm-9"><?php echo $task_name; ?></dd>
                                          
                                               <dt class="col-sm-3">Attachments if any</dt>
                                          
                                          <dd class="col-sm-9">
                                            <?php 
                                              if($attachments == "uploads/"){

                                                    echo "No Attachments</dt>";
                                              }else{

                                                echo "<a href=../admin/controllers/".$attachments." target='_blank'>click here to download attachments</a>";
                                              }
                                            ?>
                                          </dd>

                                               <dt class="col-sm-3">Deadline Date</dt>
                                          <dd class="col-sm-9"><?php echo $end_date; ?></dd>
                                               <dt class="col-sm-3">Deadline time</dt>
                                          <dd class="col-sm-9"><?php echo $end_time; ?></dd>
                                    </dl>

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
    
     <!--Morris Chart-->
		<script src="../assets/plugins/morris/morris.min.js"></script>
		<script src="../assets/plugins/raphael/raphael-min.js"></script>

        <!-- Counter Up  -->
        <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!--Chartist Chart-->
		<script src="../assets/plugins/chartist/dist/chartist.min.js"></script>
        <script src="../assets/plugins/chartist/dist/chartist-plugin-tooltip.min.js"></script>

        <!-- Knob -->
        <script src="../assets/plugins/jquery-knob/jquery.knob.js"></script>



        <!-- Charts Widget init -->
        <script src="../assets/pages/jquery.chart-widgets.init.js"></script>

        <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="../assets/plugins/parsleyjs/parsley.min.js"></script>

                 <script src="../assets/plugins/moment/moment.js"></script>
     	<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
     	<script src="../assets/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
     	<script src="../assets/plugins/clockpicker/bootstrap-clockpicker.js"></script>
     	<script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="../assets/pages/jquery.form-pickers.init.js"></script>
                
                
        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>
    
     <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>
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