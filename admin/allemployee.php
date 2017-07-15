<?php include '../database/authentication.php' ;?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- App title -->
        <title>College Management System</title>

        <!-- Switchery css -->
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- DataTables -->
        <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
        <script type="text/javascript">
            
            function deleteEmployee(user_name) {
                //alert(user_name);
                if(confirm("Are you sure you want to delete?")){
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            location.reload();
                            document.getElementById("txtHint").innerHTML = this.responseText;
                            
                        }
                    }
                    xmlhttp.open("GET", "controllers/deleteEmployee.php?q="+user_name, true);
                    xmlhttp.send();
                }
                 else {
                    document.getElementById("txtHint").innerHTML = "";
                }
            }

        </script>
    </head>




    <body>


<?php include '../inc/top-bar.php';?>

<?php include '../inc/navigation.php';?>


        <!-- ============================================================== -->
        <!-- Start main Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">Employee <span class="m-l-5"><i
                                    class="fa fa-cog"></i></span></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="addemployee.php">Create</a>
                               <!--  <a class="dropdown-item" href="accbalancereport.php">Print List</a> -->
                                
                            </div>

                        </div>
                         <h4 class="page-title">All Employees</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box">

                            <center><font color='red'><b><span id="txtHint"></span></b></font></center>
                            <?php 
                                if(isset($_GET['insertionError'])){
                                    echo "<center><font color='red'>".$_GET['insertionError']."</font></center>";
                                }
                            ?>

                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                     <table id="datatable" class="table table-striped table-bordered">
                                        <thead class="thead-default">
                                          
                        <tr>
                          <th>S.no</th>
                          <th> Name</th>
                            <th>Employee Type</th>
                          <th>Teaching Subject</th>
                            
                          <th>Phone no.</th>
                            <th>Score Card</th>
                            <th>Manage</th>
                        </tr>
                      </thead>
                       <tbody>
                            <?php 
                                include '../database/db_config.php'; 
                                $sql = "select * from employees where user_name != 'admin'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $count=0;
                                    while($row = $result->fetch_assoc()) {
                                        $count=$count+1;
                                        $user_name = $row["user_name"];
                                        $emp_name = $row["emp_name"];
                                        $emp_type = $row["emp_type"];
                                        $subject = $row["subject"];
                                        $phone = $row["phone"];
                                        $score = $row["score"];
                                        echo "<tr><td>"
                                                .$count."</td><td>"
                                                .$emp_name."</td><td>"
                                                .$emp_type."</td><td>"
                                                .$subject."</td><td>"
                                                .$phone."</td><td>"
                                                .$score."</td>
                                                <td width=230>
                                        <a  class='btn btn-primary waves-effect waves-light' href='profile_employee.php?user_name=$user_name'>View</a>
                                       
                                        <a class='btn btn-success' href='updateemployee.php?user_name=$user_name'>Update</a>"
                                        ?>
                                        
                                      <button type="button" class="btn btn-danger" onclick="deleteEmployee('<?php echo $user_name; ?>')" >Delete</button>
                                          
                                        </td></tr>
                                        <?php
                                    }
                                
                                } 
                                $conn->close();
                            ?>
                                <!-- <tr>
                                    <td>01</td>
                                       <td>Mahesh Saxena</td>
                                       <td>Teacher</td>
                                       <td>B.Com</td>
                                       <td>9899789678</td>
                                       <td>56</td>
                                  
                               
                               
                                <td width=230>
                                <a  class="btn btn-primary waves-effect waves-light" href="viewteacher.php">View</a>
                               
                                <a class="btn btn-success" href="updateteacher.php">Update</a>
                                
                                <a class="btn btn-danger" href="deleteteacher.php">Delete</a>
                                
                                
                                </td>
                                </tr>

                                    <tr>
                                    <td>01</td>
                                       <td>Manoj Singh</td>
                                       <td>General Staff</td>
                                       <td>N/A</td>
                                       <td>987833078</td>
                                       <td>72</td>
                                  
                               
                               
                                <td width=230>
                                <a  class="btn btn-primary waves-effect waves-light" href="profile.php">View</a>
                               
                                <a class="btn btn-success" href="updateemployee.php">Update</a>
                                
                                <a class="btn btn-danger" href="deleteemployee.php">Delete</a>
                                
                                
                                </td>
                                </tr>
                                            -->
                                           
                                           
                                           
                     
                      </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
                        
                    </div>
                </div>


            
<?php include '../inc/footer.php';?>


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

        <!-- Required datatable js -->
        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables/jszip.min.js"></script>
        <script src="../assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="../assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="../assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>



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