<?php 
	
	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		
        $nameError = null;
        $banknameError = null;
		$acnoError = null;
		$actypeError = null;
        $acbalError = null;
		
		// keep track post values
		$name = $_POST['name'];
        $bankname = $_POST['bankname'];
		$acno = $_POST['acno'];
		$actype = $_POST['actype'];
        $acbal = $_POST['acbal'];
		
		
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

        if (empty($acbal)) {
			$acbalError = 'Please enter balance';
			$valid = false;
		}
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE customers  set name = ?,bankname = ?,acno = ?,actype = ?, acbal = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$bankname,$acno,$actype,$acbal));
			Database::disconnect();
			header("Location: index.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM accounts where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$name = $_POST['name'];
        $bankname = $_POST['bankname'];
		$acno = $_POST['acno'];
		$actype = $_POST['actype'];
        $acbal = $_POST['actype'];
		Database::disconnect();
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
		    			<h3>Update a Account</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
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
                        
                        <div class="control-group <?php echo !empty($acbalError)?'error':'';?>">
					    <label class="control-label">Account Balance</label>
					    <div class="controls">
					      	<input name="acbal" type="text"  placeholder="ac balance" value="<?php echo !empty($acbal)?$acbal:'';?>">
					      	<?php if (!empty($acbalError)): ?>
					      		<span class="help-inline"><?php echo $acbalError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>