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

		<div class="page-wrapper">
			<!-- partial:partials/_navbar.html -->
			<?php include_once 'include/top_navi.php' ?>
			<!-- partial -->

			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i>Assign EDU Qualification </a></li>

					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Assign Education Qualification</h4>
									<form method="post" action="" enctype="multipart/form-data">

										<div class="row">
											<div class="mb-3">
				                <label class="form-label">Select Employee</label>
				                <select class="js-example-basic-single form-select" data-width="100%" name="E_id" required>
				                  <?php
				                    $result = mysqli_query($conn, "SELECT * FROM b_employees   ORDER BY E_id " );
				                    while ($row = mysqli_fetch_array($result)) {
				                  ?>
				                  <option value="<?php echo $row["E_id"];?>"><?php echo $row["E_Fname"];?> <?php echo $row["E_Lname"];?> (<?php echo $row["E_Number"];?>)</option>
				                  <?php }?>
				                </select>
				              </div>
										</div>
										<div  id="dynamic-rows">
											<div class="row">

											<h4 class="card-title">Qualification 01</h4>
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Qualification</label>
													<select class="form-select" id="exampleFormControlSelect1" name="EDU_Qualification[]" required>

																<option value="Doctor">Doctor</option>
																<option value="Master">Master</option>
																<option value="Postgraduate Diploma">Postgraduate Diploma</option>
																<option value="Postgraduate Certificate">Postgraduate Certificate</option>
																<option value="Bachelors Honours">Bachelors Honours</option>
																<option value="Bachelors">Bachelors</option>
																<option value="Higher Diploma">Higher Diploma</option>
																<option value="Diploma">Diploma</option>
																<option value="Advanced Certificate">Advanced Certificate</option>
																<option value="Certificate">Certificate</option>
													</select>
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Major</label>
													<input type="text" class="form-control" placeholder="Major" name="EDU_Major[]" required>
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Year Pass out</label>
													<select id='date-dropdown' class="form-select" name="EDU_Year[]" required>
													</select>
													<script>
															  let dateDropdown = document.getElementById('date-dropdown');

															  let currentYear = new Date().getFullYear();
															  let earliestYear = 1950;
															  while (currentYear >= earliestYear) {
															    let dateOption = document.createElement('option');
															    dateOption.text = currentYear;
															    dateOption.value = currentYear;
															    dateDropdown.add(dateOption);
															    currentYear -= 1;
															  }
												</script>
												</div>
											</div><!-- Col -->

											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">Result</label>
													<input type="text" class="form-control" placeholder="Result" name="EDU_Result[]" required>
												</div>
											</div><!-- Col -->

											<div class="col-sm-10">
												<div class="mb-3">
													<label class="form-label">Institute / School</label>
													<input type="text" class="form-control" placeholder="Institute" name="EDU_Institute[]" required>
												</div>
											</div><!-- Col -->

											<div class="col-sm-2">
												<div class="mb-3">
													<label class="form-label">&nbsp;</label>
													<button type="button" class="btn btn-danger delete-row-btn form-control">Delete Row</button>
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
									</div>
									<button id="add-row-btn" type="button" class="btn btn-primary">Add Row</button>
									<button id="submit-form-btn" type="submit" class="btn btn-success" name="add_eduq">Add Qualifications</button>

									</form>
									<?php include_once 'PHP/WRITE/Edu-Qualification-management-Script.php'; ?>
							</div>
						</div>
					</div>
				</div>







			</div>


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

	<script>
	$(document).ready(function() {
  // Add row button click event
  $('#add-row-btn').click(function() {
    var clonedRow = $('#dynamic-rows .row').first().clone();
    var lastMemberNumber = $('#dynamic-rows .row').length + 1;
    clonedRow.find('.card-title').text('Qualification ' + lastMemberNumber);
    $('#dynamic-rows').append(clonedRow);
  });

  // Delete row button click event
  $(document).on('click', '.delete-row-btn', function() {
    $(this).closest('.row').remove();
  });

  // Submit form button click event
  $('#submit-form-btn').click(function() {
    var formData = $('form').serialize();

    $.ajax({
      url: 'process.php', // Replace with your PHP file path for form processing
      method: 'POST',
      data: formData,
      success: function(response) {
        // Handle success response here
        console.log(response);
      },
      error: function(xhr, status, error) {
        // Handle error response here
        console.error(xhr, status, error);
      }
    });
  });
});


	</script>

</body>
</html>
