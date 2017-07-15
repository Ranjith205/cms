<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$nameError = null;
        $bankname = null;
		$acnoError = null;
		$actypeError = null;
       
		
		// keep track post values
		$name = $_POST['name'];
        $bankname = $_POST['bankname'];
		$acno = $_POST['acno'];
		$actype = $_POST['actype'];
      
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
        
        	if (empty($bankname)) {
			$banknameError = 'Please enter Bank Name';
			$valid = false;
		}
		
		
        if (empty($acno)) {
			$acbalError = 'Please enter ac. no';
			$valid = false;
		}
		
		if (empty($actype)) {
			$actypeError = 'Please enter actype ';
			$valid = false;
		}

       
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO accounts (name,bankname,acno,actype) values(?,?,?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$bankname,$acno,$actype));
			Database::disconnect();
			header("Location: accounts.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Create a Account</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="createacc.php" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Account Name</label>
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                        
                        					  <div class="control-group <?php echo !empty($banknameError)?'error':'';?>">
					    <label class="control-label">Bank Name</label>
					    <div class="controls">
					      	<input name="bankname" type="text"  placeholder="bankname" value="<?php echo !empty($bankname)?$bankname:'';?>">
					      	<?php if (!empty($banknameError)): ?>
					      		<span class="help-inline"><?php echo $banknameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                        
                        
					  <div class="control-group <?php echo !empty($acnoError)?'error':'';?>">
					    <label class="control-label">acno Address</label>
					    <div class="controls">
					      	<input name="acno" type="text" placeholder="acno Address" value="<?php echo !empty($acno)?$acno:'';?>">
					      	<?php if (!empty($acnoError)): ?>
					      		<span class="help-inline"><?php echo $acnoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($actypeError)?'error':'';?>">
					    <label class="control-label">actype Number</label>
					    <div class="controls">
					      	<input name="actype" type="text"  placeholder="ac type" value="<?php echo !empty($actype)?$actype:'';?>">
					      	<?php if (!empty($actypeError)): ?>
					      		<span class="help-inline"><?php echo $actypeError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>                        
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>