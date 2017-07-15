<?php 
include '../database/authentication.php' ;
$emp_id = $_GET['emp_id']; 

include '../database/db_config.php'; 

/*echo "Emp id ".$emp_id;*/
$sql = "select * from employees where emp_id = $emp_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emp_name = $row["emp_name"];
        $emp_type = $row["emp_type"];
        $subject = $row["subject"];
        $phone = $row["phone"];
        $aadhar = $row["aadhar"];
        $address = $row["address"];
        $email = $row["email"];
        $role = $row["role"];
        $image_url = $row["image_url"];
} 
$conn->close();
                                        

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- App title -->
        <title>Profile</title>

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
                    <div class="col-xs-12">                                   
                    
                
                           
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-usertitle">
					<img editable src="<?php echo "controllers/".$image_url; ?>" class="img-responsive" alt="" height="200" width="" />
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $emp_name; ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $role; ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="updateemployee.php?emp_id=<?php echo $emp_id; ?>">
							<i class="glyphicon glyphicon-home"></i>
							Edit Profile </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			  
                                <div class="col-md-12 ">
                                    <div class="p-20">
                                        
                                          <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                               role="tab" aria-controls="home" aria-expanded="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                               role="tab" aria-controls="profile">Tasks</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                               role="tab" aria-controls="profile">Attendance</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                                               role="button" aria-haspopup="true" aria-expanded="false">
                                                Link 4
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" id="dropdown1-tab" href="#dropdown1" role="tab"
                                                   data-toggle="tab" aria-controls="dropdown1">@fat</a>
                                                <a class="dropdown-item" id="dropdown2-tab" href="#dropdown2" role="tab"
                                                   data-toggle="tab" aria-controls="dropdown2">@mdo</a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home"
                                             aria-labelledby="home-tab">
                                            <p><table class="table borderless">
                                            <thead>
                                            <tr>
                                            
                                            <!--  <?php 
                                                include 'db_config.php'; 
                                                
                                                /*echo "Emp id ".$emp_id;*/
                                                $sql = "select * from employees where emp_id = $emp_id";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();
                                                        $emp_name = $row["emp_name"];
                                                        $emp_type = $row["emp_type"];
                                                        $subject = $row["subject"];
                                                        $phone = $row["phone"];
                                                        $aadhar = $row["aadhar"];
                                                        $address = $row["address"];
                                                        $email = $row["email"];
                                                } 
                                                $conn->close();
                                            ?> -->
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                 <th scope="row">Full Name</th>
                                                <td><?php echo $emp_name; ?></td>
                                                <th scope="row">Phone no.</th>
                                                <td><?php echo $phone; ?></td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <th scope="row">Employee Type</th>
                                                <td><?php echo $emp_type; ?></td>
                                                <th scope="row">Address</th>
                                                <td><?php echo $address; ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td><?php echo $email; ?></td>
                                                <th scope="row">Aadhar card no.</th>
                                                <td><?php echo $aadhar; ?></td>
                                            </tr>
                                                 <tr>
                                                <th scope="row">Last Login</th>
                                                <td>Monday 03 April 2017 at 13:52:45</td>
                                                <th scope="row">Score</th>
                                                <td><progress class="progress progress-danger" value="25" max="100">25%</progress></td>
                                            </tr>
                                                
                                           
                                            </tbody>
                                        </table></p>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                             aria-labelledby="profile-tab">
                                            <p><div class="table-responsive">
                                <table class="table table-bordered m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Task</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-muted">Practical fees</th>
                                            <td>20/02/2014</td>
                                            <td>19/02/2020</td>
                                            <td><span class="label label-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Notice printout</th>
                                            <td>20/02/2014</td>
                                            <td>19/02/2020</td>
                                            <td><span class="label label-danger">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Website update</th>
                                            <td>20/02/2014</td>
                                            <td>19/02/2020</td>
                                            <td><span class="label label-success">Completed</span></td>
                                        </tr>
                                    <tr>
                                            <th class="text-muted">office paint</th>
                                            <td>20/02/2014</td>
                                            <td>19/02/2020</td>
                                            <td><span class="label label-warning">in progress</span></td>
                                        </tr>
                                    <tr>
                                            <th class="text-muted">Lab material</th>
                                            <td>20/02/2014</td>
                                            <td>19/02/2020</td>
                                            <td><span class="label label-warning">In progress</span></td>
                                        </tr>
                                    <tr>
                                            <th class="text-muted">Printer Repair</th>
                                            <td>20/02/2014</td>
                                            <td>19/02/2020</td>
                                            <td><span class="label label-success">Completed</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

</p>
                                        </div>
                                        <div class="tab-pane fade" id="dropdown1" role="tabpanel"
                                             aria-labelledby="dropdown1-tab">
                                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out
                                                mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.
                                                Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
                                                locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR
                                                banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                                                banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                                                retro mlkshk vice blog. Scenester cred you probably haven't heard of
                                                them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth
                                                chambray yr.</p>
                                        </div>
                                        <div class="tab-pane fade" id="dropdown2" role="tabpanel"
                                             aria-labelledby="dropdown2-tab">
                                            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party
                                                before they sold out master cleanse gluten-free squid scenester freegan
                                                cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf
                                                cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR,
                                                banh mi before they sold out farm-to-table VHS viral locavore cosby
                                                sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft
                                                beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                                vegan.</p>
                                        </div>
                                    </div>
                                </div>
                                        
                                    </div>
                                </div>
                                    
                                    
                                    

                                  
                
            </div>
		</div>
	</div>
</div>
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
</center>
<br>
<br>
            
              </div></div>

                            </div>

                        </div>
                    </div>
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