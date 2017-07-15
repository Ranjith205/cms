<?php
include 'controllers/authentication_acc.php'  ;
include '../database/db_config.php'; 
$user_name = $_SESSION['user_name']; 


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
        <title>College Management- Dashboard</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

        <!-- Switchery css -->
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

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
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i
                                    class="fa fa-cog"></i></span></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>

                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>


                <!-- <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-layers pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Employees Present Today</h6>
                            <h2 class="m-b-20" data-plugin="counterup"><?php echo "$rows[$present]";?></h2>
                            <span class="label label-success"> +11% </span> <span class="text-muted"><?php echo "$rows[$present]";?></span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-paypal pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Todays Income</h6>
                            <h2 class="m-b-20">&#x20b9; <span data-plugin="counterup"> 46782</span></h2>
                            <span class="label label-danger"> -29% </span> <span class="text-muted">From previous period</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-chart pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Todays Expenses</h6>
                            <h2 class="m-b-20">&#x20b9; <span data-plugin="counterup">126500</span></h2>
                            <span class="label label-pink"> 0% </span> <span class="text-muted">From previous period</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-rocket pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Total Balance</h6>
                            <h2 class="m-b-20" >&#x20b9; <span data-plugin="counterup"> 679000</span></h2>
                            <span class="label label-warning"> +89% </span> <span class="text-muted">Last year</span>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <!-- <div class="row">
                    <div class="col-xs-12 col-lg-12 col-xl-8">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-20">Fees Summary</h4>

                            <div class="text-xs-center">
                                <ul class="list-inline chart-detail-list m-b-0">
                                    <li class="list-inline-item">
                                        <h6 style="color: #3db9dc;"><i class="zmdi zmdi-circle-o m-r-5"></i>Balance Fees</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <h6 style="color: #1bb99a;"><i class="zmdi zmdi-triangle-up m-r-5"></i>Total Received</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <h6 style="color: #818a91;"><i class="zmdi zmdi-square-o m-r-5"></i>Total Fess</h6>
                                    </li>
                                </ul>
                            </div>

                            <div id="morris-bar-stacked" style="height: 320px;"></div>

                        </div>
                    </div> --><!-- end col-->

                    <!-- <div class="col-xs-12 col-lg-12 col-xl-4">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Monthly Attendance</h4>

                            <div class="text-xs-center m-b-20">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-sm btn-secondary">Today</button>
                                    <button type="button" class="btn btn-sm btn-secondary">This Week</button>
                                    <button type="button" class="btn btn-sm btn-secondary">Last Week</button>
                                </div>
                            </div>

                            <div id="morris-donut-example" style="height: 263px;"></div>

                            <div class="text-xs-center">
                                <ul class="list-inline chart-detail-list m-b-0">
                                    <li class="list-inline-item">
                                        <h6 style="color: #3db9dc;"><i class="zmdi zmdi-circle-o m-r-5"></i>English</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <h6 style="color: #1bb99a;"><i class="zmdi zmdi-triangle-up m-r-5"></i>Italian</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <h6 style="color: #818a91;"><i class="zmdi zmdi-square-o m-r-5"></i>French</h6>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div> --><!-- end col-->


                <!-- </div> -->
                <!-- end row -->


               <!--  <div class="row">
                    <div class="col-xs-12 col-lg-12 col-xl-7">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-20">Inbox</h4>

                                    <div class="inbox-widget nicescroll" style="height: 320px;">
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="../assets/images/users/avatar-1.jpg" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author">Chadengle</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">13:40 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="../assets/images/users/avatar-2.jpg" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author">Tomaslau</p>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">13:34 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author">Stillnotdavid</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">13:17 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="../assets/images/users/avatar-4.jpg" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author">Kurafire</p>
                                                <p class="inbox-item-text">Nice to meet you</p>
                                                <p class="inbox-item-date">12:20 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="../assets/images/users/avatar-5.jpg" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author">Shahedk</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">10:15 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="../assets/images/users/avatar-6.jpg" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author">Adhamdannaway</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">9:56 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="../assets/images/users/avatar-8.jpg" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author">Arashasghari</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">10:15 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="../assets/images/users/avatar-9.jpg" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author">Joshaustin</p>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">9:56 AM</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-20">Admissions</h4>

                                    <p class="font-600 m-b-5">B.A <span class="text-danger pull-right"><b>79%</b></span></p>
                                    <progress class="progress progress-striped progress-xs progress-danger m-b-0" value="79" max="100">79%
                                    </progress>
                                </div>

                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-20">Admissions</h4>

                                    <p class="font-600 m-b-5">B.Sc <span class="text-success pull-right"><b>30%</b></span></p>
                                    <progress class="progress progress-striped progress-xs progress-success m-b-0" value="30" max="100">30%
                                    </progress>
                                </div>

                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-20">Admissions</h4>

                                    <p class="font-600 m-b-5">M.A <span class="text-warning pull-right"><b>50%</b></span></p>
                                    <progress class="progress progress-striped progress-xs progress-warning m-b-0" value="50" max="100">50%
                                    </progress>
                                </div>

                            </div>

                        </div>
                    </div> --><!-- end col--> 

                    <div class="col-xs-12 col-lg-12 col-xl-5">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Tasks</h4>

                            <div class="table-responsive">
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
                                        <?php 
                                include '../database/db_config.php'; 
                                $sql = "SELECT * FROM tasks where emp_name='$user_name'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                    
                                        $task_name = $row["task_name"];
                                        $start_date = $row['start_date'];
                                        $end_date = $row['end_date'];
                                        $status = $row['status'];
                                        echo "<tr><th class='text-muted'>"
                                                .$task_name."</th><td>";
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

                                              echo "</tr>";
                                    }
                                
                                } 
                                $conn->close();
                            ?>
                                        <!-- <tr>
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
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div><!-- end col-->


                </div>
                <!-- end row -->



                <!-- Footer -->
                          
<?php include '../inc/footer.php';?>
                <!-- End Footer -->


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

        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

        <!-- Page specific js -->
        <script src="assets/pages/jquery.dashboard.js"></script>

    </body>
</html>