<?php 
include 'controllers/authentication_co.php' ;
?>
<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$dateError = null;
		$presentError = null;
		$absentError = null;
		
		// keep track post values
		$date = $_POST['date'];
		$present = $_POST['present'];
		$absent = $_POST['absent'];
		
		// validate input
		$valid = true;
		if (empty($date)) {
			$dateError = 'Please enter date';
			$valid = false;
		}
		
	if (empty($present)) {
			$presentError = 'Please enter value';
			$valid = false;
		}
		
		if (empty($absent)) {
			$absentError = 'Please enter value';
			$valid = false;
		}
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO attendance (date,present,absent) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($date,$present,$absent));
			Database::disconnect();
			header("Location: attendance.php");
		}
	}
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
        <title>Attendance report</title>

        <!-- Switchery css -->
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        
          <!-- DataTables -->
        <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        
        
        
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
            <script src="notices/js/jquery.min.js"></script>
  <script src="notices/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="notices/css/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="notices/js/jquery-1.12.4.js"></script>
  <script src="notices/js/jquery-ui.js"></script>
 <script>

       $( function() {
    $( "#datepicker" ).datepicker({
         dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
        minDate: -0,
        maxDate: 0,
    }).datepicker("setDate", "0");
      
  } );
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
                             <!--  <a href="addtask.php">  <button type="button" class="btn btn-primary waves-effect waves-light">New Task</button></a> -->
                           

                        </div>
                       <h4 class="page-title">Attendance Report</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-6"  style="margin-left:auto; margin-right:auto;">
  
                                    <h4 class="header-title m-t-0"></h4>
                                   
                                    <div class="p-20">
                                     
                        <form data-parsley-validate novalidate action="attendance.php" method="post" enctype="multipart/form-data" >
                            
                                       
				 <div class="form-group row<?php echo !empty($dateError)?'error':'';?>">
					    <label for="date" class="col-sm-4 form-control-label">Date</label>
					     <div class="col-sm-7">
					      	<input name="date"  id="datepicker" readonly class="form-control"  placeholder="Date" value="<?php echo !empty($date)?$date:'';?>">
					      	<?php if (!empty($dateError)): ?>
					      		<span class="help-inline"><?php echo $dateError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                            
                                            <div class="form-group row <?php echo !empty($presentError)?'error':'';?>">
					    <label class="col-sm-4 form-control-label">Present</label>
					     <div class="col-sm-7">
					      	<input name="present" type="text" class="form-control"  placeholder="Present" value="<?php echo !empty($present)?$present:'';?>">
					      	<?php if (!empty($presentError)): ?>
					      		<span class="help-inline"><?php echo $presentError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                             <div class="form-group row <?php echo !empty($absentError)?'error':'';?>">
					    <label class="col-sm-4 form-control-label">absent</label>
					     <div class="col-sm-7">
					      	<input name="absent" type="text" class="form-control"  placeholder="absent" value="<?php echo !empty($absent)?$absent:'';?>">
					      	<?php if (!empty($absentError)): ?>
					      		<span class="help-inline"><?php echo $absentError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                                                                                
                                            <div class="form-group row">
                                                <div class="col-sm-8 col-sm-offset-4">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Submit
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
        
        <script src="../assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
    
   

    </body>
</html>