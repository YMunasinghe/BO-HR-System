<?php ob_start(); ?>
<?php include 'include/dbConnection.php';?>
<?php include 'include/session.php';?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>HR PORTAL - BLUE OCEAN GROUP</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
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

            <li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i>Update Employee</a></li>

					</ol>
				</nav>
				<?php include 'PHP/READ/viewemp_script.php'; ?>

				<form method="post" enctype="multipart/form-data" action="">
				<div class="row">
					<div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h3 class="page-title">Update Employee</h3>
								<hr/>
								<div class="alert alert-primary" role="alert">Personal Information</div>
                <br/>

										<div class="row">
          					       <div class="col-sm-4">
          											<div class="mb-3">
          													<label class="form-label">First Name <code>*</code></label>
          													<input type="text" class="form-control" placeholder="Enter First Name" name="E_Fname" required value="<?php echo $E_Fname; ?>"/>
          											</div>
          								</div><!-- Col -->
          								<div class="col-sm-4">
            									<div class="mb-3">
            										<label class="form-label">Middle Name</label>
            										<input type="text" class="form-control" placeholder="Enter Middle Name" name="E_Mname" value="<?php echo $E_Mname; ?>">
            									</div>
          							</div><!-- Col -->
          							<div class="col-sm-4">
          								<div class="mb-3">
          									<label class="form-label">Last Name<code>*</code></label>
          									<input type="text" class="form-control" placeholder="Enter Last Name" name="E_Lname" required value="<?php echo $E_Lname; ?>"/>
          								</div>
          							</div><!-- Col -->

												<div class="col-sm-12">
          								<div class="mb-3">
          									<label class="form-label">Surname</label>
          									<input type="text" class="form-control" placeholder="Enter surname" name="E_Sname" value="<?php echo $E_Sname; ?>"/>
          								</div>
          							</div><!-- Col -->
          				</div>

									<div class="row">
                         <div class="col-sm-4">
                              <div class="mb-3">
                                  <label class="form-label">Date of Birth<code>*</code></label>
                                  <input type="date" class="form-control" placeholder="Enter Date of Birth" name="E_Bday" required value="<?php echo $E_Bday; ?>"/>
                              </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="mb-3">
                              <label class="form-label">NIC<code>*</code></label>
                              <input type="text" class="form-control" placeholder="Enter NIC" name="E_NIC" required value="<?php echo $E_NIC; ?>"/>
                            </div>
                      </div><!-- Col -->
                      <div class="col-sm-4">
                        <div class="mb-3">
                          <label class="form-label">Religion<code>*</code></label>
													<select class="form-select" id="exampleFormControlSelect1" name="E_Religion" required>
														<option value="<?php echo $E_Religion; ?>"><?php echo $E_Religion; ?></option>

		                        <option value="Buddhism">Buddhism</option>
		                        <option value="Hinduism">Hinduism</option>
		                        <option value="Islam">Islam</option>
		                        <option value="Catholicism">Catholicism</option>
								<option value="Other Christian">Other Christian</option>
								<option value="Other">Other</option>

		                      </select>

                        </div>
                      </div><!-- Col -->
                </div>

								<div class="row">
                  <div class="col-sm-6">
                      <div class="mb-3">
                  				<label for="exampleFormControlTextarea1" class="form-label">Personal Address (Permanent)<code>*</code></label>
                  				<textarea class="form-control" id="exampleFormControlTextarea1" name="E_PAddress" required ><?php echo $E_PAddress; ?></textarea>
                  		</div>
                  </div>
                  <div class="col-sm-6">
                      <div class="mb-3">
                  				<label for="exampleFormControlTextarea1" class="form-label">Temporary Address (if differet personal)</label>
                  				<textarea class="form-control" id="exampleFormControlTextarea1" name="E_TAddress"><?php echo $E_TAddress; ?></textarea>
                  		</div>
                  </div>
                </div>

								<div class="row">
                       <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Mobile Number<code>*</code></label>
                                <input type="number" class="form-control" name="E_Mobile" placeholder="Enter Mobile Number" maxlength="10" required value="<?php echo $E_Mobile; ?>"/>
                            </div>
                      </div><!-- Col -->
                      <div class="col-sm-4">
                          <div class="mb-3">
                            <label class="form-label">Land Number</label>
                            <input type="number" class="form-control" name="E_Landno" placeholder="Enter Land Number" maxlength="10" value="<?php echo $E_Landno; ?>"/>
                          </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                      <div class="mb-3">
                        <label class="form-label">Personal Email<code>*</code></label>
                        <input type="email" class="form-control" name="E_PEmail" placeholder="Enter Personal Email" required value="<?php echo $E_PEmail; ?>"/>
                      </div>
                    </div><!-- Col -->
              </div>

							<div class="row">
                <div class="col-sm-6">
                  <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Marital Status<code>*</code></label>
                      <select class="form-select" id="exampleFormControlSelect1" name="E_MaritalStatus" required>
												<option value="<?php echo $E_MaritalStatus; ?>"><?php echo $E_MaritalStatus; ?></option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widow">Widow</option>
                        <option value="Divorced">Divorced</option>

                      </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Gender<code>*</code></label>
                      <select class="form-select" id="exampleFormControlSelect1" name="E_Gender" required >
												<option value="<?php echo $E_Gender; ?>"><?php echo $E_Gender; ?></option>
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
										<label for="exampleFormControlSelect1" class="form-label">Have Employee ever been convicted by country law?<code>*</code></label>

										<select id="yesno" onchange="toggleInputField()" class="form-select" name="E_law" required>
										  <option value="<?php echo $E_law; ?>"><?php echo $E_law; ?></option>
										  <option value="Yes">Yes</option>
										  <option value="No">No</option>
										</select>
									</div>

									<div class="mb-3" id="additionalField" style="display: none;">
											<label for="exampleFormControlSelect1" class="form-label">if yes kindly explain</label>
											<textarea class="form-control" id="additionalInput" name="E_lawDT"><?php echo $E_lawDT; ?></textarea>
										</div>
									</div>

									<div class="col-sm-6">

										<div class="mb-3">
											  <label for="exampleFormControlSelect1" class="form-label">Do Employee suffer from any long-term disease/health conditions<code>*</code></label>
											  <select class="form-select" id="yesno2" onchange="toggleInputField2()" name="E_health" required>
											    <option value="<?php echo $E_health; ?>"><?php echo $E_health; ?></option>
											    <option value="Yes">Yes</option>
											    <option value="No">No</option>
											  </select>
											</div>

											<div class="mb-3" id="additionalField2" style="display: none;">
											  <label for="additionalInput2" class="form-label">If yes, kindly explain</label>
											  <textarea class="form-control" id="additionalInput2" name="E_healthDT"><?php echo $E_healthDT; ?></textarea>
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
          													<label class="form-label">Name<code>*</code></label>
          													<input type="text" class="form-control" name="E_emergency_Name" placeholder="Enter Name" required value="<?php echo $E_emergency_Name; ?>"/>
          											</div>
          								</div><!-- Col -->
          								<div class="col-sm-12">
            									<div class="mb-3">
            										<label class="form-label">Relationship<code>*</code></label>
													<select id="relationship" name="E_emergency_Reletionship"  required class="form-select">
														<option value="<?php echo $E_emergency_Reletionship; ?>"><?php echo $E_emergency_Reletionship; ?></option>
														<option value="Father">Father</option>
														<option value="Mother">Mother</option>
														<option value="Wife">Wife</option>
														<option value="Grandmother">Grandmother</option>
														<option value="Son">Son</option>
														<option value="Daughter">Daughter</option>
														<option value="Grandfather">Grandfather</option>
														<option value="Grandmother">Grandmother</option>
													</select>
            									</div>
          							</div><!-- Col -->
          							<div class="col-sm-12">
          								<div class="mb-3">
          									<label class="form-label">Contact Number<code>*</code></label>
          									<input type="number" class="form-control" id="checkPassword" name="E_emergency_CNumber" maxlength="10" placeholder="Enter Contact" required value="<?php echo $E_emergency_CNumber; ?>"/>
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
														<?php
															$getCompanyName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM b_employees
															INNER JOIN company ON b_employees.E_Company = company.C_id WHERE company.C_id = '$E_Company'"));

															$company_name = $getCompanyName['C_name'];
														?>
														<select class="form-select" id="company-select" name="E_Company">
															<option value="<?php echo $E_Company; ?>"><?php echo $company_name; ?></option>
															<?php
																$result = mysqli_query($conn, "SELECT * FROM company WHERE C_id <> '$E_Company' ORDER BY C_id");
																while ($row = mysqli_fetch_array($result)) {
															?>
															<option value="<?php echo $E_Company;?>"> <?php echo $row["C_name"];?></option>
															<?php }?>
														</select>
          											</div>

          								</div><!-- Col -->
													<div class="col-sm-6">
	          								<div class="mb-3">
	          									<label class="form-label">Department<code>*</code></label>
												<?php
													$getDepartmentName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM b_employees
													INNER JOIN department ON b_employees.E_Department = department.D_id WHERE b_employees.E_Department = '$E_Department'"));

													$department_name = $getDepartmentName['Department_Name'];
												?>
												<select id="select_department" class="form-select" name="E_Department" required>
													<option value="<?php echo $E_Department; ?>"><?php echo $department_name; ?></option>
													<?php
														$result = mysqli_query($conn, "SELECT * FROM department WHERE company = '$E_Company'");
														while ($row = mysqli_fetch_array($result)) {
																?>
																<option value="<?php echo $row["D_id"]; ?>"> <?php echo $row["Department_Name"]; ?></option>
														<?php
													}
													?>
												</select>
	          								</div>
	          							</div><!-- Col -->
          								<div class="col-sm-6">
            									<div class="mb-3">
            										<label class="form-label">Employee Number</label>
            										<input type="text" class="form-control" placeholder="Enter Employee Number" name="E_Number" value="<?php echo $E_Number; ?>">
            									</div>
          							</div><!-- Col -->
          							<div class="col-sm-6">
          								<div class="mb-3">
          									<label class="form-label">Date of joing<code>*</code></label>
          									<input type="date" class="form-control" placeholder="Enter Date of joining" name="E_Jdate" required value="<?php echo $E_Jdate; ?>"/>
          								</div>
          							</div><!-- Col -->

												<div class="col-sm-6">
          								<div class="mb-3">
          									<label class="form-label">Employee Status<code>*</code></label>
														<select class="form-select" id="exampleFormControlSelect1" name="E_Status" required>
																	<option value="<?php echo $E_Status; ?>"><?php echo $E_Status; ?></option>
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

														<input type="number" class="form-control" name="E_Cmobile"  maxlength="10" value="<?php echo $E_Cmobile; ?>" >

          								</div>
          							</div><!-- Col -->
												<div class="col-sm-6">
          								<div class="mb-3">
          									<label class="form-label">Company Email</label>
														<input type="email" class="form-control" placeholder="Enter Position" name="E_email" value="<?php echo $E_email; ?>"  />
          								</div>
          							</div><!-- Col -->

									<div class="col-sm-6">
          								<div class="mb-3">
          									<label class="form-label">Position<code>*</code></label>
														<input type="text" class="form-control" placeholder="Enter Position" name="E_Position" required value="<?php echo $E_Position; ?>"/>
          								</div>
          							</div>

									<div class="col-sm-6">
          								<div class="mb-3">
          									<label class="form-label">Fingerprint Id</label>
											<input type="number" class="form-control" placeholder="Enter Fingerprint Id" name="E_Finger_Id" value="<?php echo $FP_Id; ?>"/>
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
                                                    <!-- <input type="file" class="form-control" accept="image/jpeg, image/png" name="E_Image"> -->
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
                               <input type="hidden" name="E_id" value="<?php echo $E_idn; ?>">
																<input type="file" class="form-control" accept="image/jpeg, image/png, image/jpg" name="E_Image" id="imageInput">
																<img class="form-control-inline mt-3" src="assets/images/employees_images/<?php echo $E_Image; ?>" alt="Default Image" id="imagePreview" style="cursor: pointer;  width: 200px; height: 200px;">

																	<script>
																	var ImageInput = document.getElementById('imageInput');
																	var preview = document.getElementById('imagePreview');

																	// This script is for Edit empployee image
																	  document.getElementById('imagePreview').addEventListener('click', function() {
																	   document.getElementById('imageInput').click();
																	  });

																	  document.getElementById('imageInput').addEventListener('change', function() {
																	    var fileInput = document.getElementById('imageInput');
																	    var file = fileInput.files[0];

																	    if (file) {
																	      var reader = new FileReader();

																	      reader.onload = function(e) {
																	        document.getElementById('imagePreview').src = e.target.result;
																	      };
																	      reader.readAsDataURL(file);
																	    }
																	  });
																	</script>
																	<div class="form-check-inline">
																	</div>



							</div>
						</div>
					</div>
				</div>

				<button type="submit" class="btn btn-primary submit"  name="updateempl">Update Employee</button>
			</form>

				<?php include 'PHP/WRITE/update_employee_script.php';?>
			</div>

			<!-- partial:partials/_footer.html -->
      <?php include_once 'include/footer.php' ?>
      <!-- partial -->

		</div>
	</div>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
				// Get references to the two dropdowns and the input field
				const companySelect = document.getElementById("company-select");

				const departmentSelect = document.getElementById("select_department");

				companySelect.addEventListener("change", function () {

						departmentSelect.innerHTML = '<option selected disabled value>Select</option>';

						var selectedCompanyName = document.getElementById('company-select').value;

						// if (selectedCompanyName !== "Select Company") {
								fetchProjects(selectedCompanyName);
						// }
				});

				function fetchProjects(companyName) {
					const departmentSelect = document.getElementById("select_department");
						$.ajax({
								url: "fatch_department.php",
								type: "POST",
								data: { company_name: companyName },
								dataType: "json",
								success: function (data) {
									departmentSelect.innerHTML = '<option selected disabled value>Select Department</option>';
									// console.log(data.length);

										if (data && data.length > 0) {
												data.forEach(function (project) {
														const option = document.createElement("option");
														option.value = project.Department_Name;
														option.textContent = project.Department_Name;
														departmentSelect.appendChild(option);
												});
										} else {
												console.log("No projects found for the selected company.");
										}
								},
								error: function (xhr, status, error) {
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
