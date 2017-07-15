<?php 
include '../controllers/authentication_co.php' ;

?>

<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$date_ntError = null;
		$email_chError = null;
        $email_ntError = null;
		$notice_ntError = null;
        $notice_dtError = null;
        $website_ntError = null;
        $verified_ntError = null;
        $verified_rsError = null;
		
		// keep track post values
		$date_nt = $_POST['date_nt'];
		$email_ch = $_POST['email_ch'];
		$email_nt = $_POST['email_nt'];
        $notice_nt = $_POST['notice_nt'];
        $notice_dt = $_POST['notice_dt'];
        $website_nt = $_POST['website_nt'];
        $verified_nt = $_POST['verified_nt'];
        $verified_rs = $_POST['verified_rs'];
		
		// validate input
		$valid = true;
		if (empty($date_nt)) {
			$date_ntError = 'Please enter Date';
			$valid = false;
		}
		
		if (empty($email_ch)) {
			$email_chError = 'Please enter Email check status';
			$valid = false;
		}
		
		if (empty($email_nt)) {
			$email_ntError = 'Please enter details';
			$valid = false;
		}
        if (empty($notice_nt)) {
			$notice_ntError = 'Please enter details';
			$valid = false;
		}
        if (empty($notice_dt)) {
			$notice_dtError = 'Please enter details';
			$valid = false;
		}
        if (empty($website_nt)) {
			$email_ntError = 'Please enter details';
			$valid = false;
		}
		if (empty($verified_nt)) {
			$verified_ntError = 'Please enter details';
			$valid = false;
		}
        if (empty($verified_rs)) {
			$verified_rsError = 'Please enter details';
			$valid = false;
		}
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO notices (date_nt,email_ch,email_nt,notice_nt,notice_dt,website_nt,verified_nt,verified_rs) values(?, ?, ?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($date_nt,$email_ch,$email_nt,$notice_nt,$notice_dt,$website_nt,$verified_nt,$verified_rs));
			Database::disconnect();
			header("Location: ../notices/index.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
   
    <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
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
    <div class="container">
                            
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Report Submission- Notices/emails/websites</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group <?php echo !empty($date_ntError)?'error':'';?>">
					    <label class="control-label">Date</label>
					    <div class="controls">
					      	<input name="date_nt" type="text" id="datepicker" readonly placeholder="date" value="<?php echo !empty($date_nt)?$date_nt:'';?>">
					      	<?php if (!empty($date_ntError)): ?>
					      		<span class="help-inline"><?php echo $date_ntError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($email_chError)?'error':'';?>">
					    <label class="control-label">Emails checked ?</label>
					    <div class="controls">
                            
                            <select name="email_ch" class="form-control" id="sel1" value="<?php echo !empty($email_ch)?$email_ch:'';?>">
        <option></option>
        <option>Yes</option>
        <option>No</option>
      </select>
					      	<?php if (!empty($email_chError)): ?>
					      		<span class="help-inline"><?php echo $email_chError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                         <div class="control-group <?php echo !empty($email_ntError)?'error':'';?>">
					    <label class="control-label">Email details</label>
					    <div class="controls">
					      	<input name="email_nt" type="text"  placeholder="details of email /notices" value="<?php echo !empty($email_nt)?$email_nt:'';?>">
					      	<?php if (!empty($email_ntError)): ?>
					      		<span class="help-inline"><?php echo $email_ntError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($notice_ntError)?'error':'';?>">
					    <label class="control-label">Notices checked ?</label>
					    <div class="controls">
					      	<select name="notice_nt" type="text"  placeholder="" value="<?php echo !empty($notice_nt)?$notice_nt:'';?>">
                             <option></option>
        <option>Yes</option>
        <option>No</option>
      </select>
					      	<?php if (!empty($notice_ntError)): ?>
					      		<span class="help-inline"><?php echo $notice_ntError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                         <div class="control-group <?php echo !empty($notice_dtError)?'error':'';?>">
					    <label class="control-label">Notices details</label>
					    <div class="controls">
					      	<input name="notice_dt" type="text"  placeholder="Details of notices" value="<?php echo !empty($notice_dt)?$notice_dt:'';?>">
					      	<?php if (!empty($notice_dtError)): ?>
					      		<span class="help-inline"><?php echo $notice_dtError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                         <div class="control-group <?php echo !empty($website_ntError)?'error':'';?>">
					    <label class="control-label">Websites of ncte, nrc, scholorship checked ?</label>
					    <div class="controls">
					      	<select name="website_nt" type="text"  placeholder="" value="<?php echo !empty($website_nt)?$website_nt:'';?>">
                                 <option></option>
        <option>Yes</option>
        <option>No</option>
      </select>
					      	<?php if (!empty($website_ntError)): ?>
					      		<span class="help-inline"><?php echo $website_ntError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                         <div class="control-group <?php echo !empty($verified_ntError)?'error':'';?>">
					    <label class="control-label">Notices , emails printout taken verified and submitted to Principal/ Authorized person</label>
					    <div class="controls">
					      	<select name="verified_nt" type="text"  placeholder="" value="<?php echo !empty($verified_nt)?$verified_nt:'';?>">
                            <option></option>
        <option>Yes</option>
        <option>No</option>
      </select>
					      	<?php if (!empty($verified_ntError)): ?>
					      		<span class="help-inline"><?php echo $verified_ntError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                        <div class="control-group <?php echo !empty($verified_rsError)?'error':'';?>">
					    <label class="control-label">If print not taken give reason</label>
					    <div class="controls">
					      	<input name="verified_rs" type="text"  placeholder="Reason" value="<?php echo !empty($verified_rs)?$verified_rs:'';?>">
					      	<?php if (!empty($verified_rsError)): ?>
					      		<span class="help-inline"><?php echo $verified_rsError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                       
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Submit Report</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>