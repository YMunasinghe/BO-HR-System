<?php ob_start();?>
<?php include 'include/dbConnection.php';?>
<?php include 'include/session.php';?>
<?php
$result=mysqli_query($conn, "select U_id from user  where U_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HR PORTAL - BLUE OCEAN GROP</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
	<link rel="stylesheet" href="assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
	<link rel="stylesheet" href="assets/vendors/dropzone/dropzone.min.css">
	<link rel="stylesheet" href="assets/vendors/dropify/dist/dropify.min.css">
	<link rel="stylesheet" href="assets/vendors/pickr/themes/classic.min.css">
	<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendors/flatpickr/flatpickr.min.css">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->
	<link rel="stylesheet" href="assets/css/demo1/style.min.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
		<?php include_once 'include/side-navi.php' ?>
		<!-- partial:partials/_sidebar.html -->


		<!-- partial -->

		<div class="page-wrapper">

      <!-- partial:partials/_navbar.html -->
      <?php include_once 'include/top_navi.php' ?>
      <!-- partial -->

			<div class="page-content">

        <nav class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i> Convert Employee to User</a></li>

          </ol>
        </nav>





				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Convert Employee to User</h4>
                			<form method="post" enctype="multipart/form-data">
								<div class="mb-3">
									<label class="form-label">Select Employee</label>

										<select class="js-example-basic-single form-select" data-width="100%" name="empid" required>
										<?php
											$result = mysqli_query($conn, "SELECT e.E_id, e.E_Fname, e.E_Lname FROM b_employees e 
											LEFT JOIN user u ON e.E_id = u.E_id WHERE u.E_id IS NULL AND e.E_email != ''");

											if (!$result) {
											    // Check for query execution error
											    echo "Error: " . mysqli_error($conn);
											} else {
											    while ($row = mysqli_fetch_array($result)) {
											        ?>
											        <option value="<?php echo $row["E_id"]; ?>"> <?php echo $row["E_Fname"]; ?> <?php echo $row["E_Lname"]; ?> (<?php echo $row["E_id"]; ?>)</option>
											        <?php
											    }
											}

											// Free result set
											mysqli_free_result($result);


											?>

									</select>
								</div>

                <div class="mb-3">
      										<label for="exampleInputUsername1" class="form-label">Password</label>
      										<input type="Password" class="form-control" id="password" onkeyup='check()' autocomplete="off" placeholder="User Password" name="Epw" required>
      						</div>

                  <div class="mb-3">
      											<label for="exampleInputUsername1" class="form-label">Re-Enter Password</label>
      											<input type="Password" class="form-control" id="checkPassword" onkeyup='check()' autocomplete="off" placeholder="Re-Enter Password" name="E_password" required>
      							</div>
                    <p id="alertPassword"></p>

                    <div class="mb-3">
      												<label for="exampleInputUsername1" class="form-label">User Level</label>
      												<select class="form-select" id="exampleFormControlSelect1" name="U_level">
																<option value="3">User</option>
																<option value="2">Manager</option>
																<option value="1">Admin</option>
      														<option value="0">Supper Admin</option>
      											</select>
      								</div>

                      <input type="hidden" value="<?php echo $session_id?>" name="Created_by">
                			<?php $uad = date("Y-m-d"); ?>
                			<input type="hidden" value="<?php echo $uad;?>" name="Created_Date">

                      <button type="submit" class="btn btn-primary" name="C_Add_NU">Add User</button>
                    </form>
                    <?php include_once 'PHP/WRITE/add_System-User-script.php'; ?>
							</div>

						</div>
					</div>

				</div>

			</div>
      <script>
      var check = function() {
      	 if (document.getElementById('password').value ==
      			 document.getElementById('checkPassword').value) {
      			 document.getElementById('alertPassword').style.color = '#8CC63E';
      			 document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-check-circle"></i>Match !</span>';
      	 } else {
      			 document.getElementById('alertPassword').style.color = '#EE2B39';
      			 document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i>Not matching !</span>';
      	 }
      }
      </script>
      <!-- partial:partials/_footer.html -->
      <?php include_once 'include/footer.php' ?>
      <!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
	<script src="assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
	<script src="assets/vendors/inputmask/jquery.inputmask.min.js"></script>
	<script src="assets/vendors/select2/select2.min.js"></script>
	<script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
	<script src="assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
	<script src="assets/vendors/dropzone/dropzone.min.js"></script>
	<script src="assets/vendors/dropify/dist/dropify.min.js"></script>
	<script src="assets/vendors/pickr/pickr.min.js"></script>
	<script src="assets/vendors/moment/moment.min.js"></script>
	<script src="assets/vendors/flatpickr/flatpickr.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<script src="assets/js/form-validation.js"></script>
	<script src="assets/js/bootstrap-maxlength.js"></script>
	<script src="assets/js/inputmask.js"></script>
	<script src="assets/js/select2.js"></script>
	<script src="assets/js/typeahead.js"></script>
	<script src="assets/js/tags-input.js"></script>
	<script src="assets/js/dropzone.js"></script>
	<script src="assets/js/dropify.js"></script>
	<script src="assets/js/pickr.js"></script>
	<script src="assets/js/flatpickr.js"></script>
	<!-- End custom js for this page -->

</body>
</html>
