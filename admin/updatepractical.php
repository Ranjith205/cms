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
        <title>Update Practical</title>

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
                           <a href="practicals.php">  <button type="button" class="btn btn-primary waves-effect waves-light">Go Back</button></a>
                           

                        </div>
                        <h4 class="page-title">Update Practical</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-6"  style="margin-left:auto; margin-right:auto;">
  
                                    <h4 class="header-title m-t-0"></h4>
                                   
                                    <div class="p-20">
                                     
                        <form role="form" data-parsley-validate novalidate action="controllers/updatePractical.php" method="get">

                            <?php 
                                include '../database/db_config.php'; 
                                $pract_id = $_GET['param1'];
                                /*echo "Emp id ".$emp_id;*/
                                $sql = "select * from practicals where pract_id = $pract_id";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $pract_name = $row["pract_name"];
                                        $pract_fee = $row["pract_fee"];
                                        

                                } 
                                $conn->close();
                            ?>
                                <input type="hidden" name="pract_id" value="<?php echo $pract_id; ?>">
                              
                                           <div class="form-group row">
                                                <label for="name" class="col-sm-4 form-control-label">Course Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="pract_name" type="text" value="<?php echo $pract_name; ?>" parsley-type="text" class="form-control" id="name" placeholder="name">
                                                </div>
                                            </div>
                            
                             
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-4 form-control-label">Fee <span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="pract_fee" type="number" value="<?php echo $pract_fee; ?>" parsley-type="number" class="form-control" id="name" placeholder="mobile no.">
                                                </div>
                                            </div>
                            
                            
                                        </div>                                        
                                            <div class="form-group row">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Update
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