

<?php 
	
	require 'database.php';


	if ( !empty($_POST)) {
		// keep track validation errors
        $idError = null;
        $dateError = null;
		$particularsError = null;
        
		
		
		// keep track post values
         $id = $_POST['id'];
        $date = $_POST['date'];
        $particulars = $_POST['particulars'];
        $amountdr = $_POST['amountdr'];
		$amountcr = $_POST['amountcr'];
		$notes = $_POST['notes'];
		
		// validate input
		$valid = true;
		
        
        
          if (empty($date)) {
			$date = 'Please enter Date';
			$valid = false;
		}
		
		if (empty($particulars)) {
			$particularsError = 'Please enter description';
			$valid = false;
		
		}
		
		
		
		
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO ledger (id,date,particulars,amountdr,amountcr,notes) values(?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($id,$date,$particulars,$amountdr,$amountcr,$notes));
			Database::disconnect();
			header("Location: daybook.php");
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
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>Day Book</title>

        <!-- Switchery css -->
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
        
         <!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
        <script>
            
  $( function() {
    $( "#datepicker-autoclose" ).datepicker({
      
      changeMonth: true,
      changeYear: true,
        minDate: -20,
        maxDate: "+1M +10D"
    });
      
  } );
      
  </script>

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
                           <a href="accounts.php">  <button type="button" class="btn btn-primary waves-effect waves-light">Go Back</button></a>
                           

                        </div>
                        <h4 class="page-title">Daybook </h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-6">
  
                                    <h4 class="header-title m-t-0">Make transaction</h4>
                                   
                                    <div class="p-20">
                                     
                        <form action="Daybook.php" method="post">
                         <div class="form-group row">
					    <label class="col-sm-4 form-control-label">Account name</label>
                             <div class="col-sm-7">
					    <input  class="form-control" type="text"  placeholder="name" readonly="readonly"  value="Cash">
					      
					   
					    </div>
					  </div>
                        <div class="form-group row <?php echo !empty($idError)?'error':'';?>">
					    <label class="col-sm-4 form-control-label">Ledger ID</label>
					      <div class="col-sm-2">
                            
					      	<input name="id" class="form-control" type="text" readonly="readonly"  placeholder="id" id="disabledInput"  value="31">	
					    </div>
					  </div>
                         
                     
                            
                            
				 <div class="form-group row<?php echo !empty($dateError)?'error':'';?>">
					    <label for="date" class="col-sm-4 form-control-label">Date</label>
					     <div class="col-sm-7">
					      	<input name="date"  id="datepicker-autoclose" class="form-control"  placeholder="Date" value="<?php echo !empty($date)?$date:'';?>">
					      	<?php if (!empty($dateError)): ?>
					      		<span class="help-inline"><?php echo $dateError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                        
                        <div class="form-group row <?php echo !empty($particularsError)?'error':'';?>">
					    <label class="col-sm-4 form-control-label">Particulars</label>
					     <div class="col-sm-7">
					      	<input name="particulars" type="text" class="form-control"  placeholder="Particulars" value="<?php echo !empty($particulars)?$particulars:'';?>">
					      	<?php if (!empty($particularsError)): ?>
					      		<span class="help-inline"><?php echo $particularsError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                        
                        
                        
                         <div class="form-group row <?php echo !empty($amountdrError)?'error':'';?>">
					    <label class="col-sm-4 form-control-label">Debit amount</label>
					     <div class="col-sm-7">
					      	<input name="amountdr" type="number" class="form-control" placeholder="" value="<?php echo !empty($amountdr)?$amountdr:'';?>">
					      	
					    </div>
					  </div>
                        
                          <div class="form-group row <?php echo !empty($amountcrError)?'error':'';?>">
					    <label class="col-sm-4 form-control-label">Credit amount</label>
					     <div class="col-sm-7">
					      	<input name="amountcr" type="number" class="form-control" placeholder="" value="<?php echo !empty($amountcr)?$amountcr:'';?>">
					      	
					    </div>
					  </div>
                        
                        
                        
					   <div class="form-group row <?php echo !empty($notesError)?'error':'';?>">
					    <label class="col-sm-4 form-control-label">Notes</label>
					     <div class="col-sm-7">
					      	<input name="notes" type="text" class="form-control" placeholder="additional notes" value="<?php echo !empty($notes)?$notes:'';?>">
					      	
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



                 <div class="col-sm-12 col-xs-12 col-md-6">
                                    <h4 class="header-title m-t-0">Account Statistics</h4>
                                   
                                  
                               <?php

    
//make connection
mysql_connect('localhost', 'root', 'ranjith');

//select db
mysql_select_db('college_ms');

$sql="SELECT * FROM ledger WHERE id= 31";
$records=mysql_query($sql);



        $u = mysql_query("SELECT SUM(amountcr) as sum FROM ledger WHERE id=31") or die(mysql_error());
$totalcr = mysql_fetch_assoc($u);
       
        $q = mysql_query("SELECT SUM(amountdr) as sum FROM ledger WHERE id=31") or die(mysql_error());
$totaldr = mysql_fetch_assoc($q);

         $left=$totalcr['sum']-$totaldr['sum'];
       
       
        ?>
                     
                     

                            

                            <div class="row text-xs-center m-t-30">
                                <div class="col-xs-4">
                                    <h3 data-plugin="counterup" class="text-warning"><?php echo $totalcr['sum'];?></h3>
                                    <p class="text-muted">Total Credit </p>
                                </div>
                                <div class="col-xs-4">
                                    <h3 data-plugin="counterup" class="text-danger"><td><?php echo $totaldr['sum'];?></td></h3>
                                    <p class="text-muted">Total Debit</p>
                                </div>
                                <div class="col-xs-4">
                                    <h3 data-plugin="counterup" class="text-success"><?php echo "$left";?></h3>
                                    <p class="text-muted">Available Balance</p>
                                </div>
                            </div>

                            <div id="morris-area-example" style="height: 300px;"></div>

                        </div>
                    </div><!-- end col-->
                                  
  
                       <div class="col-sm-12 col-xs-12 col-md-12">
                                    <h4>Account Statement</h4>
                                   
                                    <div class="p-20">
        
        


 <div class="p-20">
                                        
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                     <table id="datatable" class="table table-striped table-bordered">
                                        <thead class="thead-default">
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
                                </div></div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
                        
                    </div>
                </div>
    
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
    
    <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    
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