<?php ob_start(); ?>
<?php include 'include/dbConnection.php';?>
<?php include 'include/session.php';?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>HR PORTAL - BLUE OCEAN GROP</title>

	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="assets/css/demo1/style.min.css">
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
            			<li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i>Register Employee</a></li>
					</ol>
				</nav>

				<form method="post" enctype="multipart/form-data" action="">
					<div class="row">
						<div class="col-md-12 stretch-card">
							<div class="card">
								<div class="card-body">
									<h3 class="page-title">Register Employee</h3>
									<hr/>
									<div class="alert alert-primary" role="alert">Personal Information</div>
                						<br/>
										<div class="row">
          					       			<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">First Name <code>*</code></label>
													<input type="text" class="form-control" placeholder="Enter First Name" name="E_Fname" required/>
												</div>
          									</div><!-- Col -->
          									<div class="col-sm-4">
            									<div class="mb-3">
            										<label class="form-label">Middle Name</label>
            										<input type="text" class="form-control" placeholder="Enter Middle Name" name="E_Mname">
            									</div>
          									</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Last Name</label>
													<input type="text" class="form-control" placeholder="Enter Last Name" name="E_Lname"/>
												</div>
											</div><!-- Col -->
											<div class="col-sm-12">
												<div class="mb-3">
													<label class="form-label">Surname</label>
													<input type="text" class="form-control" placeholder="Enter surname" name="E_Sname"/>
												</div>
											</div>
          								</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Date of Birth<code>*</code></label>
													<input type="date" class="form-control" placeholder="Enter Date of Birth" name="E_Bday" required/>
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">NIC</label>
													<input type="text" class="form-control" placeholder="Enter NIC" name="E_NIC"/>
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Religion</label>
													<select class="form-select" id="exampleFormControlSelect1" name="E_Religion">
														<option value="" required selected>Select</option>
														<option value="Buddhism">Buddhism</option>
														<option value="Hinduism">Hinduism</option>
														<option value="Islam">Islam</option>
														<option value="Catholicism">Catholicism</option>
														<option value="Other Christian">Other Christian</option>
														<option value="Other">Other</option>
													</select>
												</div>
											</div>
                						</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlTextarea1" class="form-label">Personal Address (Permanent)</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" name="E_PAddress"></textarea>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlTextarea1" class="form-label">Temporary Address (if differet personal)</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" name="E_TAddress"></textarea>
												</div>
											</div>
                						</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Personal Mobile Number</label>
													<input type="number" class="form-control" name="E_Mobile" placeholder="Enter Mobile Number" maxlength="10"/>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Land Number</label>
													<input type="number" class="form-control" name="E_Landno" placeholder="Enter Land Number" maxlength="10"/>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">Personal Email</label>
													<input type="email" class="form-control" name="E_PEmail" placeholder="Enter Personal Email"/>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlSelect1" class="form-label">Marital Status</label>
													<select class="form-select" id="exampleFormControlSelect1" name="E_MaritalStatus">
														<option value="Single">Single</option>
														<option value="Married">Married</option>
														<option value="Widow">Widow</option>
														<option value="Divorced">Divorced</option>
													</select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="mb-3">
													<label for="exampleFormControlSelect1" class="form-label">Gender</label>
													<select class="form-select" id="exampleFormControlSelect1" name="E_Gender">
														<option value="Female">Female</option>
														<option value="Male">Male</option>
														<option value="Rather not say">Rather not say</option>
														<option value="Custom">Custom</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
												<label for="exampleFormControlSelect1" class="form-label">Have Employee ever been convicted by country law?</label>
												<select id="yesno" onchange="toggleInputField()" class="form-select" name="E_law">
													<option value="">-- Select --</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										<div class="mb-3" id="additionalField" style="display: none;">
												<label for="exampleFormControlSelect1" class="form-label">if yes kindly explain</label>
												<textarea class="form-control" id="additionalInput" name="E_lawDT"></textarea>
											</div>
										</div>
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="exampleFormControlSelect1" class="form-label">Do Employee suffer from any long-term disease/health conditions</label>
											<select class="form-select" id="yesno2" onchange="toggleInputField2()" name="E_health">
												<option value="">-- Select --</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="mb-3" id="additionalField2" style="display: none;">
											<label for="additionalInput2" class="form-label">If yes, kindly explain</label>
											<textarea class="form-control" id="additionalInput2" name="E_healthDT"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-6 stretch-card">
						<div class="card">
							<div class="card-body">
								<div class="alert alert-danger" role="alert">Emergency Contact Details</div>
									<br/>
									<div class="row">
          					       		<div class="col-sm-12">
          									<div class="mb-3">
												<label class="form-label">Name</label>
												<input type="text" class="form-control" name="E_emergency_Name" placeholder="Enter Name"/>
											</div>
          									</div><!-- Col -->
											<div class="col-sm-12">
												<div class="mb-3">
													<label class="form-label">Reletionship</label>
													<select id="relationship" name="E_emergency_Reletionship" class="form-select">
														<option value="">-- Select --</option>
														<option value="Father">Father</option>
														<option value="Mother">Mother</option>
														<option value="Wife">Wife</option>
														<option value="Grandmother">Grandmother</option>
														<option value="Son">Son</option>
														<option value="Daughter">Daughter</option>
														<option value="Brother">Brother</option>
														<option value="Sister">Sister</option>
														<option value="Grandfather">Grandfather</option>
														<option value="Grandmother">Grandmother</option>
													</select>
            									</div>
          									</div><!-- Col -->
          									<div class="col-sm-12">
												<div class="mb-3">
													<label class="form-label">Contact Number</label>
													<input type="number" class="form-control" id="checkPassword" name="E_emergency_CNumber" maxlength="10" placeholder="Enter Contact" />
												</div>
          									</div><!-- Col -->
          								</div>
									</div>
								</div>
							</div>

							<div class="col-md-6 stretch-card">
								<div class="card">
									<div class="card-body">
										<div class="alert alert-primary" role="alert">Employment</div>
										<br/>
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Company<code>*</code></label>
													<select class="form-select" id="company-select" name="E_Company" required>
														<option value="" disabled selected>Select Company</option>
														<?php
															$result = mysqli_query($conn, "SELECT * FROM company ORDER BY C_id");
															while ($row = mysqli_fetch_array($result)) {
														?>
														<option value="<?php echo $row["C_id"];?>"> <?php echo $row["C_name"];?></option>
														<?php }?>
													</select>
												</div>
											</div><!-- Col -->
										<div class="col-sm-6">
	          								<div class="mb-3">
	          									<label class="form-label">Department<code>*</code></label>
												<select id="select_department" class="form-select" name="E_Department" required>
													<option value="" disabled selected>Select Department</option>
												</select>
	          								</div>
	          							</div><!-- Col -->
          								<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label">Employee Number</label>
												<input type="text" class="form-control" placeholder="Enter Employee Number" name="E_Number">
											</div>
          								</div><!-- Col -->
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label">Date of joing</label>
												<input type="date" class="form-control" placeholder="Enter Date of joing" name="E_Jdate"/>
											</div>
										</div><!-- Col -->
										<div class="col-sm-6">
          									<div class="mb-3">
          										<label class="form-label">Employee Status</label>
												<select class="form-select" id="exampleFormControlSelect1" name="E_Status" required>
													<option value="">Select</option>
													<option value="Contract">Contract</option>
													<option value="Permanent">Permanent</option>
													<option value="Fixed Term">Fixed Term</option>
													<option value="intern">Intern</option>
												</select>
          									</div>
          								</div><!-- Col -->

										<div class="col-sm-6">
          									<div class="mb-3">
          										<label class="form-label">Company Mobile</label>
												<input type="number" maxlength="11" class="form-control" name="E_Cmobiles" >
											</div>
          								</div><!-- Col -->
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label">Company Email</label>
												<input type="email" class="form-control" placeholder="Enter Company Email" name="E_email" />
          									</div>
          								</div><!-- Col -->

									<div class="col-sm-6">
          								<div class="mb-3">
          									<label class="form-label">Position<code>*</code></label>
											<input type="text" class="form-control" placeholder="Enter Position" name="E_Position" required/>
          								</div>
          							</div>
									<div class="col-sm-6">
          								<div class="mb-3">
          									<label class="form-label">Fingerprint Id<code>*</code></label>
											<input type="number" class="form-control" placeholder="Enter Fingerprint Id" name="E_Finger_Id" required/>
          								</div>
          							</div>
          						</div>
							</div>
						</div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="mb-3">
											<label class="form-label">Employee Image</label>
											<input type="file" class="form-control" accept="image/jpeg, image/png" name="E_Image">
										</div>
									</div><!-- Col -->
								</div><!-- Row -->
								<button type="submit" class="btn btn-primary submit"  name="regemp">Register Employee</button>
							</div>
						</div>
					</div>
				</div>
			</form>
				<?php include 'PHP/WRITE/Add-Employee-script.php'; ?>
		</div>
      			<?php include_once 'include/footer.php' ?>
	</div>
</div>
<script>
	document.addEventListener("DOMContentLoaded", function () {
			// Get references to the two dropdowns and the input field
			const companySelect = document.getElementById("company-select");
			const departmentSelect = document.getElementById("select_department");

			// Event listener for the company dropdown
			companySelect.addEventListener("change", function () {
					departmentSelect.innerHTML = '<option selected disabled value>Select</option>';

					const selectedCompanyName = document.getElementById("company-select").value;

					if (selectedCompanyName !== "Select Company") {
							fetchProjects(selectedCompanyName);
					}
			});

			// Function to fetch projects using AJAX
			function fetchProjects(companyName) {
					$.ajax({
							url: "fatch_department.php",
							type: "POST",
							data: { company_name: companyName },
							dataType: "json",
							success: function (data) {
								if (data && data.length > 0) {
									departmentSelect.innerHTML = '<option selected disabled value>Select Department</option>';
									data.forEach(function (project) {
										const option = document.createElement("option");
										option.value = project.D_id;
										option.textContent = project.Department_Name;
										departmentSelect.appendChild(option);
									});
								} else {
									// Handle the case where no data is returned
									console.log("No Departments found for the selected company.");
								}
							},
							error: function (xhr, status, error) {
								// Handle AJAX errors
								console.error("AJAX error:", status, error);
							}
					});
			}
	});
</script>



	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

	<script>
		function toggleInputField() {
			var selectElement = document.getElementById('yesno');
			var additionalField = document.getElementById('additionalField');
			var additionalInput = document.getElementById('additionalInput');

			if (selectElement.value === 'Yes') {
				additionalField.style.display = 'block';
				additionalInput.required = true;
			} else {
				additionalField.style.display = 'none';
				additionalInput.required = false;
			}
		}


	</script>

	<script>
  function toggleInputField2() {
    var selectElement = document.getElementById('yesno2');
    var additionalField2 = document.getElementById('additionalField2');
    var additionalInput2 = document.getElementById('additionalInput2');

    if (selectElement.value === 'Yes') {
      additionalField2.style.display = 'block';
      additionalInput2.required = true;
    } else {
      additionalField2.style.display = 'none';
      additionalInput2.required = false;
    }
  }
</script>


</body>
</html>
