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
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

  <!-- End plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
	<link rel="stylesheet" href="assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
	<link rel="stylesheet" href="assets/vendors/dropzone/dropzone.min.css">
	<link rel="stylesheet" href="assets/vendors/dropify/dist/dropify.min.css">
	<link rel="stylesheet" href="assets/vendors/pickr/themes/classic.min.css">
	<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendors/flatpickr/flatpickr.min.css">

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

		<?php include_once 'include/side-navi.php' ?>

		<div class="page-wrapper">
      	<?php include_once 'include/top_navi.php' ?>

			<div class="page-content">
				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
           	 			<li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i>Employee List</a></li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
									<div>
										<h4 class="mb-3 mb-md-0">Add Attendence Bulk Format 1</h4>
									</div>
									<div class="d-flex align-items-center flex-wrap text-nowrap">
										<a href="assets/templates/attendesbulkupload.csv"><button type="download" class="btn btn-outline-success btn-icon-text me-2 mb-2 mb-md-0" download> Download Format 1 CSV</button></a>
									</div>
								</div>

								<form method="post" enctype="multipart/form-data">
									<div class="mb-3">
										<select name="selectedLocation" class="form-select" required>
											<option value="0" selected>Select Location</option>
										<?php
											$getLocations = "SELECT * FROM location WHERE act_status = 1";
											$getLocationsResult = mysqli_query($conn, $getLocations);
											while ($row = mysqli_fetch_array($getLocationsResult)) {
										?>
											<option value="<?php echo $row['location_id'] ?>"><?php echo $row['location_name'] ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label" for="formFile">File upload</label>
										<input class="form-control" type="file" id="formFile" name="attendencecsv" required>
									</div>
										<button type="submit" class="btn btn-primary submit" name="attendencesheet">Upload</button>
								</form>
              				</div>
            			</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
									<div>
										<h4 class="mb-3 mb-md-0">Add Attendence Bulk Format 2</h4>
									</div>
									<div class="d-flex align-items-center flex-wrap text-nowrap">
									<a href="assets/templates/attendesbulkuploadFormat2.csv"><button type="download" class="btn btn-outline-success btn-icon-text me-2 mb-2 mb-md-0" download> Download Format 2 CSV</button></a>
									</div>
								</div>

								<form method="post" enctype="multipart/form-data">
									<div class="mb-3">
										<select name="selectedLocation" class="form-select" required>
											<option value="0" selected>Select Location</option>
										<?php
											$getLocations = "SELECT * FROM location WHERE act_status = 1";
											$getLocationsResult = mysqli_query($conn, $getLocations);
											while ($row = mysqli_fetch_array($getLocationsResult)) {
										?>
											<option value="<?php echo $row['location_id'] ?>"><?php echo $row['location_name'] ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label" for="formFile">File upload</label>
										<input class="form-control" type="file" id="formFile" name="attendencecsvFormat2" required>
									</div>
										<button type="submit" class="btn btn-primary submit" name="attendencesheetFormat2">Upload</button>
								</form>
								<?php include_once 'PHP/WRITE/add-attendence-script.php'?>
              				</div>
            			</div>
					</div>
				</div>



				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<form method="post" action="" enctype="multipart/form-data">
							<div class="card-body">
								<h4 class="mb-3 mb-md-0">Add Attendence</h4>
								<div class="row">
									<div class="col-lg-6">
										<label class="form-label mt-3" for="formFile">Select Location</label>
										<select  name="selectedLocation" class="form-select" required>
											<option value="0" selected>Select Location</option>
										<?php
											$getLocations = "SELECT * FROM location WHERE act_status = 1";
											$getLocationsResult = mysqli_query($conn, $getLocations);
											while ($row = mysqli_fetch_array($getLocationsResult)) {
										?>
											<option value="<?php echo $row['location_id'] ?>"><?php echo $row['location_name'] ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="mt-3 col-lg-6">
										<label class="form-label" for="formFile">Select Date</label>
										<input name="attendenceDate" type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
									</div>
									<div id="dynamic-rows">
										<hr class="mt-3">
										<div class="row">
										<div class="col-lg-12">
											<label class="form-label" for="formFile">Select Employee</label>
												<select  name="selectedEmployee[]" class="form-select" required>
													<option value="0" selected>Select Employee</option>
												<?php
													$getLocations = "SELECT * FROM b_employees WHERE FP_Id > 0";
													$getLocationsResult = mysqli_query($conn, $getLocations);
													while ($row = mysqli_fetch_array($getLocationsResult)) {
												?>
													<option value="<?php echo $row['FP_Id'] ?>"><?php echo $row['FP_Id'] ?> - <?php echo $row['E_Fname'] ?> <?php echo $row['E_Lname'] ?></option>
												<?php } ?>
												</select>
										</div>
									<div class="mt-3 col-lg-6">
										<label class="form-label" for="formFile">Start Time</label>
										<input name="startTime[]" type="time" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" step="1" required>
									</div>
									<div class="mt-3 col-lg-6">
										<label class="form-label" for="formFile">End Time</label>
										<input name="endTime[]" type="time" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" step="1" required>
									</div>
									<div class="col-md-3 grid-margin stretch-card">
										<button type="button" class="btn btn-danger delete-row-btn mt-3">Delete</button>
									</div>
									</div>
								</div>
							</div>
							<button id="add-row-btn" type="button" class="btn btn-primary">Add Row</button>
							<button id="submit-form-btn" type="button" class="btn btn-success" name="add_attendence_manu">Add Attendence</button>
						</form>
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
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="assets/js/data-table.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>


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
    // clonedRow.find('.card-title').text('Member ' + lastMemberNumber);
    $('#dynamic-rows').append(clonedRow);
  });

  // Delete row button click event
  $(document).on('click', '.delete-row-btn', function() {
    $(this).closest('.row').remove();
  });

  // Submit form button click event
  $('#submit-form-btn').click(function() {
    var formData = $('form').serialize();
	console.log(formData);
    $.ajax({
      url: 'PHP/WRITE/add-attendence-manual-script.php', // Replace with your PHP file path for form processing
      method: 'POST',
      data: formData,
      success: function(response) {
        // Handle success response here
		let res = response;

		let result = [];
		let regex = /\((\d+)\)([^-]+)-/g;
		let match;
		while ((match = regex.exec(res)) !== null) {
			let number = match[1];
			let names = match[2];

			// Split names into first name and last name using the slash (/) delimiter
			let nameParts = names.split("/");

			// Extract first name and last name
			let firstName = nameParts[0];
			let lastName = nameParts.length > 1 ? nameParts[1] : ''; // In case last name is not provided

			// Store the data in the result array
			result.push({ number: number, firstName: firstName, lastName: lastName });

		}

		if (result.length === 0) {
			Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Successfully Inserted",
			showConfirmButton: false,
			timer: 1500
			}).then((result) => {
				window.location.href = 'Add-Attendence.php';
			});
		} else {
			let htmlContent = '<div>';
			result.forEach(function(person) {
				htmlContent += '<p><strong>Finger ID:</strong>' + person.number + '  <strong>Name:</strong>' + person.firstName + ' ' + person.lastName + '</p>';
			});
			htmlContent += '</div>';

			Swal.fire({
				title: 'Some Employees already exist',
				html: htmlContent,
				icon: 'info'
			}).then((result) => {
				window.location.href = 'Add-Attendence.php';
			});
		}

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

<!-- add emp modal -->
</html>
