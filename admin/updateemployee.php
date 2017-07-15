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
        <title>Update Profile</title>

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
                           <a href="allemployee.php">  <button type="button" class="btn btn-primary waves-effect waves-light">Go Back</button></a>
                           

                        </div>
                        <h4 class="page-title">Update Profile</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-6"  style="margin-left:auto; margin-right:auto;">
  
                                    <h4 class="header-title m-t-0"></h4>
                                   
                                    <div class="p-20">
                                     
                        <form role="form" data-parsley-validate novalidate action="controllers/updateEmployee.php" method="get">

                            <?php 
                                include '../database/db_config.php'; 
                                $user_name = $_GET['user_name'];
                                /*echo "Emp id ".$user_name;*/
                                $sql = "select * from employees where user_name = '$user_name'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $emp_name = $row["emp_name"];
                                        $emp_type = $row["emp_type"];
                                        $gender = $row["gender"];
                                        $doj = $row["doj"];
                                        $subject = $row["subject"];
                                        $phone = $row["phone"];
                                        $aadhar = $row["aadhar"];
                                        $address = $row["address"];
                                        $email = $row["email"];
                                        $role = $row["role"];

                                } 
                                $conn->close();
                            ?>
                                <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
                              <div class="form-group row">
                                            <label for="exampleSelect1" class="col-sm-4 form-control-label">Employee Type</label>
                                 <div class="col-sm-7">
                                            <select class="form-control" id="exampleSelect1" name="emp_type" >
                                                <option value="Teacher" <?php if($emp_type == "Teacher")echo "selected"; ?> >Teacher</option>
                                                <option value="General Staff" <?php if($emp_type == "General Staff")echo "selected"; ?> >General Staff</option>
                                            
                                     </select></div>
                                        </div>
                            
                                           <div class="form-group row">
                                                <label for="name" class="col-sm-4 form-control-label">Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="emp_name" type="text" value="<?php echo $emp_name; ?>" parsley-type="text" class="form-control" id="name" placeholder="name">
                                                </div>
                                            </div>
                            
                             <div class="form-group row">
                                            <label for="exampleSelect1" class="col-sm-4 form-control-label">Gender</label>
                                 <div class="col-sm-7">
                                            <select class="form-control" id="exampleSelect1" name="gender">
                                                <option value="Male" <?php if($emp_type == "Male")echo "selected"; ?>>Male</option>
                                                <option value="Female" <?php if($emp_type == "Female")echo "selected"; ?>>Female</option>
                                            
                                     </select></div>
                                        </div>
                            
                            <!-- <div class="form-group row">
                                                <label for="userpic" class="col-sm-4 form-control-label">User profile picture<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="image_url" type="file" required parsley-type="file" class="form-control" id="userpic" placeholder="name">
                                                </div>
                                            </div> -->
                            
                             <div class="form-group row">
                                                <label for="subject" class="col-sm-4 form-control-label">Date of Joining<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="doj" type="date" value="<?php echo $doj; ?>" parsley-type="text" class="form-control" id="name" placeholder="">
                                                </div>
                                            </div>
                            
                            
                            <div class="form-group row">
                                                <label for="subject" class="col-sm-4 form-control-label">Teaching Subject<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="subject" type="text" value="<?php echo $subject; ?>" parsley-type="text" class="form-control" id="name" placeholder="Subject">
                                </div></div>
                          
                             <div class="form-group row">
                                                <label for="phone" class="col-sm-4 form-control-label">Phone no.<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="phone" type="number" value="<?php echo $phone; ?>" parsley-type="number" class="form-control" id="name" placeholder="mobile no.">
                                                </div>
                                            </div>
                            
                            <div class="form-group row">
                                                <label for="phone" class="col-sm-4 form-control-label">Aadhaar no.
                                                </label>
                                                <div class="col-sm-7">
                                                    <input name="aadhar" type="number" value="<?php echo $aadhar; ?>" parsley-type="number" class="form-control"
                                                           id="name" placeholder="Aadhaar no.">
                                                </div>
                                            </div>
                             <div class="form-group row">
                                                <label for="address" class="col-sm-4 form-control-label">Address<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="address" type="text" value="<?php echo $address; ?>" parsley-type="text" class="form-control"
                                                           id="name" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 form-control-label">Email<span class="text-danger"></span></label>
                                                <div class="col-sm-7">
                                                    <input name="email" type="email" value="<?php echo $email; ?>" parsley-type="email" class="form-control"
                                                           id="inputEmail3" placeholder="Email">
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-4 form-control-label">Create Password<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input name="password" id="hori-pass1" type="password" placeholder="Password" required
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
                                            </div> -->
                            <div class="form-group row">
                                            <label for="exampleSelect1" class="col-sm-4 form-control-label">User Role</label>
                                 <div class="col-sm-7">
                                            <select class="form-control" id="exampleSelect1" name="role">
                                                <option value="Admin" <?php if($role == "Admin") echo "selected"; ?>>Admin</option>
                                                <option value="Teacher" <?php if($role == "Teacher") echo "selected"; ?> >Teacher</option>
                                                <option value="Accountant" <?php if($role == "Accountant") echo "selected"; ?> >Accountant</option>
                                                <option value="Computer operator" <?php if($role == "Computer operator") echo "selected"; ?> >Computer operator</option>
                                                <option value="Student" <?php if($role == "Student") echo "selected"; ?> >Student</option>
                                                
                                            
                                     </select></div>
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