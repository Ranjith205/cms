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
		$sitenameError = null;
        $idError = null;
	
		
		// keep track post values
      
		$sitename = $_POST['sitename'];
	
		
		// validate input
		$valid = true;
		if (empty($sitename)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
        
        if (empty($idname)) {
			$idError = 'Please enter Name';
			$valid = false;
		}
		
		
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE site  set sitename = ? WHERE id = 1";
			$q = $pdo->prepare($sql);
			$q->execute(array($sitename));
			Database::disconnect();
			header("Location: index.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM site where id = 1";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$sitename = $data['sitename'];
       
	
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
		    			<h3>Site Settings</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="sitesettings.php?id=<?php echo $id?>" method="post">
					  <div class="control-group <?php echo !empty($sitenameError)?'error':'';?>">
					    <label class="control-label">Site Name</label>
					    <div class="controls">
					      	<input name="sitename" type="text"  placeholder="Name" value="<?php echo !empty($sitename)?$sitename:'';?>">
					      	<?php if (!empty($sitenameError)): ?>
					      		<span class="help-inline"><?php echo $sitenameError;?></span>
					      	<?php endif; ?>
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