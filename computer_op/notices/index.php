<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>Daily Notices/Emails/Website checking report</h3>
    		</div>
			<div class="row">
				<p>
					
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Date</th>
		                  <th>Emails Checked</th>
		                  <th>Email notes</th>
		                  <th>Notices Checked</th>
                             <th>Notices Details</th>
                             <th>Websites Checked</th>
                             <th>Prinout taken</th>
                             <th>If No- Reason</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM notices ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['date_nt'] . '</td>';
							   	echo '<td>'. $row['email_ch'] . '</td>';
							   	echo '<td>'. $row['email_nt'] . '</td>';
                                echo '<td>'. $row['notice_nt'] . '</td>';
                                echo '<td>'. $row['notice_dt'] . '</td>';
                                echo '<td>'. $row['website_nt'] . '</td>';
                                echo '<td>'. $row['verified_nt'] . '</td>';
                                echo '<td>'. $row['verified_rs'] . '</td>';
                           
							   	
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>