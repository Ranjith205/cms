
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="College Management System">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>Add New Teacher</title>

        <!-- Switchery css -->
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        
        
           <!-- Plugins css -->
        <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="assets/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="assets/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        
        
         <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <!--Chartist Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/chartist/dist/chartist.min.css">
        

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- Modernizr js -->
        <script src="assets/js/modernizr.min.js"></script>

    </head>
 


<body>
    
    <?php include 'inc/top-bar.php';?>

<?php include 'inc/navigation.php';?>

   <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                           <a href="allteachers.php">  <button type="button" class="btn btn-primary waves-effect waves-light">Go Back</button></a>
                           

                        </div>
                        <h4 class="page-title">Add New Teacher</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-6"  style="margin-left:auto; margin-right:auto;">
  
                                    <h4 class="header-title m-t-0"></h4>
                                   
                                    <div class="p-20">
                                     
                        <form role="form" data-parsley-validate novalidate>
                            
                                           <div class="form-group row">
                                                <label for="name" class="col-sm-4 form-control-label">Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" required parsley-type="text" class="form-control"
                                                           id="name" placeholder="name">
                                                </div>
                                            </div>
                            
                             <div class="form-group row">
                                            <label for="exampleSelect1" class="col-sm-4 form-control-label">Gender</label>
                                 <div class="col-sm-7">
                                            <select class="form-control" id="exampleSelect1">
                                                <option>Select</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            
                                     </select></div>
                                        </div>
                            
                            <div class="form-group row">
                                                <label for="userpic" class="col-sm-4 form-control-label">User profile picture<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="file" required parsley-type="file" class="form-control"
                                                           id="userpic" placeholder="name">
                                                </div>
                                            </div>
                            
                             <div class="form-group row">
                                                <label for="subject" class="col-sm-4 form-control-label">Date of Joining<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" required parsley-type="text" class="form-control"
                                                           id="name" placeholder="Joining Date">
                                                </div>
                                            </div>
                            
                            
                            <div class="form-group row">
                                                <label for="subject" class="col-sm-4 form-control-label">Teaching Subject<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" required parsley-type="text" class="form-control"
                                                           id="name" placeholder="Subject">
                                                </div>
                          
                             <div class="form-group row">
                                                <label for="phone" class="col-sm-4 form-control-label">Phone no.<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="number" required parsley-type="number" class="form-control"
                                                           id="name" placeholder="mobile no.">
                                                </div>
                                            </div>
                            
                            <div class="form-group row">
                                                <label for="phone" class="col-sm-4 form-control-label">Aadhaar no.<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="number" required parsley-type="number" class="form-control"
                                                           id="name" placeholder="Aadhaar no.">
                                                </div>
                                            </div>
                             <div class="form-group row">
                                                <label for="address" class="col-sm-4 form-control-label">Address<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" required parsley-type="text" class="form-control"
                                                           id="name" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 form-control-label">Email<span class="text-danger"></span></label>
                                                <div class="col-sm-7">
                                                    <input type="email" required parsley-type="email" class="form-control"
                                                           id="inputEmail3" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-4 form-control-label">Create Password<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input id="hori-pass1" type="password" placeholder="Password" required
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hori-pass2" class="col-sm-4 form-control-label">Confirm Password
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input data-parsley-equalto="#hori-pass1" type="password" required
                                                           placeholder="Password" class="form-control" id="hori-pass2">
                                                </div>
                                            </div>
                            <div class="form-group row">
                                            <label for="exampleSelect1" class="col-sm-4 form-control-label">User Role</label>
                                 <div class="col-sm-7">
                                            <select class="form-control" id="exampleSelect1">
                                                <option>Select</option>
                                                <option>Admin</option>
                                                <option>Teacher</option>
                                                <option>Computer operator</option>
                                                <option>accountant</option>
                                                    <option>Subscriber</option>
                                                
                                            
                                     </select></div>
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
                    
    
    <?php include 'inc/footer.php';?>
    
      </div> <!-- container -->
    
        </div> <!-- End wrapper -->
    
    
    
    <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
    
     <!--Morris Chart-->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael-min.js"></script>

        <!-- Counter Up  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!--Chartist Chart-->
		<script src="assets/plugins/chartist/dist/chartist.min.js"></script>
        <script src="assets/plugins/chartist/dist/chartist-plugin-tooltip.min.js"></script>

        <!-- Knob -->
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>



        <!-- Charts Widget init -->
        <script src="assets/pages/jquery.chart-widgets.init.js"></script>

        <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="assets/plugins/parsleyjs/parsley.min.js"></script>

                 <script src="assets/plugins/moment/moment.js"></script>
     	<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
     	<script src="assets/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
     	<script src="assets/plugins/clockpicker/bootstrap-clockpicker.js"></script>
     	<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="assets/pages/jquery.form-pickers.init.js"></script>
                
                
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>


    </body>
</html>