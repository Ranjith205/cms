<?php include '../database/authentication.php' ;?>
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
        <title>Add New Task</title>

        <!-- Switchery css -->
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        
        
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

        <script>
        function showEmp(str) {
            //alert(str);
          if (str=="") {
            document.getElementById("empNames").innerHTML="";
            return;
          } 
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
          } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
              document.getElementById("empNames").innerHTML=this.responseText;
            }
          }
          xmlhttp.open("GET","controllers/getEmpNames.php?q="+str,true);
          xmlhttp.send();
        }
        </script>


    </head>
 


<body>
    
    <?php include '../inc/top-bar.php';?>

<?php include '../inc/navigation.php';?>

   <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                           <a href="alltasks.php">  <button type="button" class="btn btn-primary waves-effect waves-light">Go Back</button></a>
                           

                        </div>
                        <h4 class="page-title">Add New Task</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-6"  style="margin-left:auto; margin-right:auto;">
  
                                    <h4 class="header-title m-t-0"></h4>
                                   
                                    <div class="p-20">
                                     
                        <form role="form" data-parsley-validate novalidate action="controllers/addTask.php" method="post" enctype="multipart/form-data">
                             <div class="form-group row">
                                <label for="exampleSelect1" class="col-sm-4 form-control-label">Department</label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="exampleSelect1" name="emp_type" onchange="showEmp(this.value)">
                                        <option value="">Choose type</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="General Staff">General Staff</option>
                                    </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleSelect2" class="col-sm-4 form-control-label">Employee Name</label>
                                <div class="col-sm-7">
                                        <div id="empNames">Employee Names will be listed here.</div> 
                                    </div>
                            </div>
                                         
                                          <!--  <div class="form-group row">
                                                <label for="name" class="col-sm-4 form-control-label">Employee Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="emp_id" type="text" required parsley-type="text" class="form-control" id="name" placeholder="name">
                                                </div>
                                            </div> -->
                            
                            
                            
                            
                             <div class="form-group row">
                                                <label for="subject" class="col-sm-4 form-control-label">Date <span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="start_date" type="date" required parsley-type="text" class="form-control" id="name" placeholder="Date">
                                                </div>
                                            </div>
                            
                            <div class="form-group row">
                                                <label for="subject" class="col-sm-4 form-control-label">Time <span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="start_time" type="text" required parsley-type="text" class="form-control" id="name" placeholder="HH : MM">
                                                </div>
                                            </div>
                            
                            
                            <div class="form-group row">
                                                <label for="subject" class="col-sm-4 form-control-label">Task<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="task_name" type="text-area" required parsley-type="text" class="form-control" id="name" placeholder="Task">
                                                </div>
                                            </div>
                           <div class="form-group row">
                                                <label for="userpic" class="col-sm-4 form-control-label">Attachment if any<span class="text-danger"></span></label>
                                                <div class="col-sm-7">
                                                    <input name="attachments" type="file"  class="form-control" id="userpic" placeholder="name">
                                                </div>
                                            </div>
                             
                                        <div class="form-group row">
                                                <label for="subject" class="col-sm-4 form-control-label">Deadline Date <span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="end_date" type="date" required parsley-type="text" class="form-control" id="enddate" placeholder="Deadline Date">
                                                </div>
                                            </div>
                            
                            <div class="form-group row">
                                                <label for="subject" class="col-sm-4 form-control-label">Time <span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="end_time" type="text" required parsley-type="text" class="form-control" id="time" placeholder="HH : MM">
                                                </div>
                                            </div>
                                                                   
                                            <div class="form-group row">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Add
                                                    </button>
                                                    <button type="reset"
                                                            class="btn btn-secondary waves-effect m-l-5">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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


    </body>
</html>