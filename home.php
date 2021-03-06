<?php
	include("utilities/config.php");
	session_start();
	if(!isset($_SESSION['username'])){
	   header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>All Users</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
		include("utilities/sidebar.php");
	?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div style="margin-top:30px;" class="container-fluid">
			<?php
			$timestamp = time();
			$cur_year = (int)date('Y',$timestamp);
			$cur_month = (int)date('m',$timestamp);
			$cur_day = (int)date('d',$timestamp);
			$cur_hour = (int)date('h',$timestamp);
			$cur_min = (int)date('i',$timestamp);
			$cur_sec = (int)date('s',$timestamp);
			$cur_date = $cur_year.'-'.$cur_month.'-'.$cur_day.' '.$cur_hour.':'.$cur_min.':'.$cur_sec;
			echo "The current time is " . $cur_date;


			?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Registered Users</h1>
          <!-- DataTales Example -->
          <div style="margin-top:30px;" class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
	                    <th>Expiry Date</th>
                        <th>Name</th>
	                    <th>Email</th>
	                    <th>Phone</th>
	                    <th>State</th>
	                    <th>Organization</th>
	                    <th>Device ID</th>
	                    <th>Registration Date</th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php
	  				  	$sql = "SELECT * FROM users;";
	  					$result = mysqli_query($conn, $sql);
	  					$resultcheck = mysqli_num_rows($result);
	  					if ($resultcheck > 0) {
	  						while ($row = mysqli_fetch_assoc($result)) {?>
		                    <tr>
		                      	<td><?php echo $row['e_date']; ?></td>
		                      	<td><?php echo $row['name']; ?></td>
		                      	<td><?php echo $row['email']; ?></td>
		                      	<td><?php echo $row['phone']; ?></td>
		                      	<td><?php echo $row['state']; ?></td>
		                      	<td><?php echo $row['org']; ?></td>
		                      	<td><?php echo $row['device_id']; ?></td>
		                      	<td><?php echo $row['r_date']; ?></td>

		                    </tr>
							<?php
							}
						} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
  		include("utilities/footer.php");
  	?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
	include("utilities/logout.modal.php");
?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
