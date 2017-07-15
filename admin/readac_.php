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
		$sql = "SELECT * FROM students where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>Ram Ratan Singh Memorial Degree College</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap-2.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'inc/nav.php';?>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Student Profile</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
                        <div class="control-group">
					    <label class="control-label">Profile ID</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['id'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Name</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['name'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Father name</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['fname'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Mobile Number</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['phone'];?>
						    </label>
					    </div>
					  </div>
                         <div class="control-group">
					    <label class="control-label">Course</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['course'];?>
						    </label>
					    </div>
					  </div>
                         <div class="control-group">
					    <label class="control-label">Practical Subject</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['subject'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <a class="btn" href="index.php">Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>