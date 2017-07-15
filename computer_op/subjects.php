<?php include 'controllers/authentication_co.php';?>
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
        <title>Subjects</title>

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
        <link href="../assets/css/profile.css" rel="stylesheet" type="text/css" />
        <style>
        .borderless td, .borderless th {
    border: none;
}
        </style>

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- Modernizr js -->
        <script src="../assets/js/modernizr.min.js"></script>

        <script type="text/javascript">
            
            function deleteSubject(subject_id) {
                //alert(emp_id);
                if(confirm("Are you sure you want to delete subject?")){
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            location.reload();
                            document.getElementById("txtHint").innerHTML = this.responseText;
                            
                        }
                    }
                    xmlhttp.open("GET", "controllers/deleteSubject.php?q="+subject_id, true);
                    xmlhttp.send();
                }
                 else {
                    document.getElementById("txtHint").innerHTML = "";
                }
            }

        </script>

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
                                <!-- <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">Create Subjects</button> -->
                           
                           

                        </div>
                        <h4 class="page-title">Subjects</h4>
                    </div>
                </div>
                
                    <!-- sample modal content -->
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Create New Subject</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4></h4>
                                            <form role="form" data-parsley-validate novalidate action="controllers/addSubject.php" method="get">
                            
                                           <div class="form-group row">
                                                <label for="name" class="col-sm-4 form-control-label">Subject Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="subject_name" type="text" required parsley-type="text" class="form-control"
                                                           id="name" placeholder="subject name">
                                                </div>
                                            </div>
                            
                            
                             
                                                  
                                            <div class="form-group row">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Add
                                                    </button>
                                                    <button type="reset"
                                                            class="btn btn-secondary waves-effect m-l-5">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                           

                                            
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
              


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12"  style="margin-left:auto; margin-right:auto;">
  
                                    <h4 class="header-title m-t-0"></h4>
                                   
                                    <div class="p-20">
                      
                       <div class="col-sm-12 col-xs-12 col-md-12">
                                    <h4>Current Subjects</h4>
                                   
                                    <div class="p-20">
        
        

                                   <center><font color='red'><b><span id="txtHint"></span></b></font></center>
                                        
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                     <table id="datatable" class="table table-striped table-bordered">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>S.No</th>
                                                <th> Subject Name</th>
                                                <!-- <th>Manage</th> -->
                                            </tr> 
                                        </thead>
                            <?php 
                                include '../database/db_config.php'; 
                                $sql = "select * from subjects";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $count = 0;
                                    while($row = $result->fetch_assoc()) {
                                        $count = $count + 1;
                                        
                                        $subject_id = $row["subject_id"];
                                        $subject_name = $row["subject_name"];
                                        
                                        
                                        echo "<tr><td>"
                                                .$count."</td><td>"
                                                .$subject_name."</td></td></tr>";
                                                
                                               
                                                /*."<td width=230>
                                        <a class='btn btn-success' href='updatesubject.php?param1=$subject_id'>Update</a>
                                        
                                        <button type='button' class='btn btn-danger' onclick='deleteSubject($subject_id)'>Delete</button>
                                        */
                                        
                                        
                                    }
                                
                                } 
                                $conn->close();
                            ?>
<!-- 
                                    <tr>

                                        <td>01</td>
                                            <td>Hindi </td>
                                            <td width=180>
                							   	<a class="btn btn-success" href="update.php">Update</a>
                							   	&nbsp;
                							   	<a class="btn btn-danger" href="delete.php">Delete</a></td>                                
                                        </tr>
                                        <tr>
                                         
                                        <td>02</td>
                                            <td>English </td>
                                            <td width=180>
                							   	<a class="btn btn-success" href="update.php">Update</a>
                							   	&nbsp;
                							   	<a class="btn btn-danger" href="delete.php">Delete</a></td>                                
                                        </tr>        -->
                
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