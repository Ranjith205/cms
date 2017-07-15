<?php 


	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM accounts where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}


// keep track post values
         $id = $_POST['id'];
       


?>


 <?php

    
//make connection
mysql_connect('localhost', 'root', 'ranjith');

//select db
mysql_select_db('college_ms');

$sql="SELECT * FROM ledger WHERE id=$_REQUEST[id]";
$records=mysql_query($sql);



        $u = mysql_query("SELECT SUM(amountcr) as sum FROM ledger WHERE id=$_REQUEST[id]") or die(mysql_error());
$totalcr = mysql_fetch_assoc($u);
       
        $q = mysql_query("SELECT SUM(amountdr) as sum FROM ledger WHERE id=$_REQUEST[id]") or die(mysql_error());
$totaldr = mysql_fetch_assoc($q);

         $left=$totalcr['sum']-$totaldr['sum'];
       
       
        ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>Account Information</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

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
                       
                        <h4 class="page-title">Account Information</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-layers pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">A/c Holder's Name</h6>
                            <h2 class="m-b-20"> <span><?php echo $data['name'];?></span></h2>
                            <span class="label label-success"> +11% </span> <span class="text-muted">From previous period</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-paypal pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Bank's Name</h6>
                            <h2 class="m-b-20"><span><?php echo $data['bankname'];?></span></h2>
                            <span class="label label-danger"> -29% </span> <span class="text-muted">From previous period</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-chart pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">A/c Number</h6>
                            <h2 class="m-b-20"><span><?php echo $data['acno'];?></span></h2>
                            <span class="label label-pink"> 0% </span> <span class="text-muted">From previous period</span>
                        </div>
                    </div>

                     <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-rocket pull-xs-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Available Balance</h6>
                            <h2 class="m-b-20"><span>Rs.<?php echo "$left";?></span></h2>
                            <span class="label label-warning"> +89% </span> <span class="text-muted">Last year</span>
                        </div>
                    </div>  
                </div>
                <!-- end row -->
                
                
               
<div class="content">
            <div class="container-fluid">
                            <div class="header">

         
                                
                                
             
  <table class="table">
    <thead style="background-color:#1abc9c;">
      <tr>
        <th>Total Cr</th>
        <th>Total Dr</th>
        <th>Balance</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $totalcr['sum'];?></td>
        <td><?php echo $totaldr['sum'];?></td>
        <td><?php echo "$left";?></td>
      </tr>
      
    </tbody>
  </table>


  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped users-table" id="users-list" width="100%">
      <h4>Fees Ledger</h4>
                  <thead style="background-color:#1abc9c;">
<tr>

<th>Date</th>
<th>Particulars</th>
    <th>Amount Debit</th>
    <th>Amount Credit</th>
    
     

     </tr> </thead>

<?php
while($ledger=mysql_fetch_assoc($records)){
echo "<tr>";


echo"<td>".$ledger['date']."</td>";
echo"<td>".$ledger['particulars']."</td>";
    echo"<td>".$ledger['amountdr']."</td>";
    echo"<td>".$ledger['amountcr']."</td>";
    
                                
echo"</tr>";
}//end while
?>
        
                
              </table>
                
                
                
                

	<?php include 'inc/footer.php';?>				
					 
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <!-- Page specific js -->
        <script src="assets/pages/jquery.dashboard.js"></script>

    </body>
</html>