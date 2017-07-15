<?php include 'controllers/authentication_acc.php'  ;?>

<?php

/*    
//make connection
mysql_connect('localhost', 'root'. '');

//select db
mysql_select_db('college_ms');

$sql="SELECT * FROM ledger ";
$records=mysql_query($sql);



        $u = mysql_query("SELECT SUM(amountcr) as sum FROM ledger ") or die(mysql_error());
$totalcr = mysql_fetch_assoc($u);
       
        $q = mysql_query("SELECT SUM(amountdr) as sum FROM ledger ") or die(mysql_error());
$totaldr = mysql_fetch_assoc($q);

         $left=$totalcr['sum']-$totaldr['sum'];
       */
       
        ?>

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
        <title>Total Bank Balance</title>

        <!-- Switchery css -->
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

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
                                    data-toggle="dropdown" aria-expanded="false">Action <span class="m-l-5"><i
                                    class="fa fa-cog"></i></span></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="accounts.php">All Accounts</a>
                                <a class="dropdown-item" href="#">Print Report</a>
                            </div>

                        </div>
                        <h4 class="page-title">Balance Database</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-rocket pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Available Balance</h6>
                            <h2 class="m-b-20"><span>Rs.<?php echo "$left";?></span></h2>
                            <span class="label label-warning"> +89% </span> <span class="text-muted">Last year</span>
                        </div>
                    </div> 

                                  

                         

                        </div>
                    </div><!-- end col-->

                </div>
                <!-- end row -->



                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                2016 © College.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->


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

        <!-- Flot chart js -->
        <script src="assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.axislabels.js"></script>

        <!-- flot init -->
        <script src="assets/pages/jquery.flot.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>