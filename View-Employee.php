<?php ob_start(); ?>
<?php include 'include/dbConnection.php';?>
<?php include 'include/session.php';?>
<!DOCTYPE html>
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
	<link rel="stylesheet" href="assets/vendors/prismjs/themes/prism.css">
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
						<li class="breadcrumb-item"><a href="#!"> <i data-feather="chevron-right"></i> Employees</a></li>
            			<li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i> View Employee</a></li>
					</ol>
				</nav>	
        <!-- -->
        <?php include 'PHP/READ/View-Employee-script.php'; ?>
        <!-- -->
        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class=" col-md-4 col-xl-3 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2" align="center">
                  <p ><img src="assets/images/employees_images/<?php echo $E_Image;?>" class="wd-100 wd-sm-200 me-3" alt="..."></p>
                </div>
                <h6 class="card-title mb-0"><?php echo $E_Fname;?> <?php echo $E_Lname; ?></h6>
                <a href="#!"><label class="tx-11  mb-0 text-uppercase" align="center"><?php echo $E_Position;?></label></a>
                <hr/>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Employee Number:</label>
                  <p class="text-muted"><?php echo $E_Number; ?></p>
                </div>

                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Employee Status:</label>
                  <p class="text-muted"><?php echo $E_Status; ?></p>
                </div>

                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Mobile:</label>
                  <p class="text-muted"><?php echo $E_Cmobile; ?></p>
                </div>

                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                  <p class="text-muted"><?php echo $E_email; ?></p>
                </div>


                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                  <p class="text-muted"><?php echo $E_Jdate; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Company:</label>
                  <p class="text-muted"><?php echo $C_name; ?></p>
                </div>

              </div>
            </div>
          </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 ">
            <div class="card rounded">
              <div class="card-body">

						<div class="example">
							<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
									<a class="nav-link">&nbsp;</a>
									<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>
								<div class="collapse navbar-collapse" id="navbarSupportedContent1" >
									<ul class="navbar-nav me-auto" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Family</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Education</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="disabled-tab" data-bs-toggle="tab" href="#disabled" role="tab" aria-controls="disabled" aria-selected="false">Emergency</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="Doc-tab" data-bs-toggle="tab" href="#Doc" role="tab" aria-controls="Doc" aria-selected="false">Doc</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="JobHis-tab" data-bs-toggle="tab" href="#JobHis" role="tab" aria-controls="JobHis" aria-selected="false">Job-His</a>
										</li>
									</ul>
								</div>
							</nav>

							<div class="tab-content border border-top-0 p-3" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

									<h6 class="mb-1">Full Name:</h6>
								  <p><?php echo $E_Sname; ?> <?php echo $E_Fname; ?> <?php echo $E_Mname; ?> <?php echo $E_Lname; ?></p>
								  <hr/>

								  <h6 class="mb-1">Date of Birth:</h6>
								  <p><?php echo $E_Bday; ?></p>
								  <hr/>

								  <h6 class="mb-1">Age:</h6>
								  <p><?php echo $years; ?> Years, <?php echo $months; ?> Monrhs & <?php echo $days; ?> Days</p>
								  <hr/>

								  <h6 class="mb-1">NIC:</h6>
								  <p><?php echo $E_NIC; ?></p>
								  <hr/>

								  <h6 class="mb-1">Religion:</h6>
								  <p><?php echo $E_Religion; ?></p>
								  <hr/>

								  <h6 class="mb-1">Personal Address (Permanent):</h6>
								  <p><?php echo $E_PAddress; ?></p>
								  <hr/>

								  <h6 class="mb-1">Temporary Address:</h6>
								  <p><?php echo $E_TAddress; ?></p>
								  <hr/>

								  <h6 class="mb-1">Mobile Number:</h6>
								  <p><?php echo $E_Mobile; ?></p>
								  <hr/>

								  <h6 class="mb-1">Land Number:</h6>
								  <p><?php echo $E_Landno; ?></p>
								  <hr/>

								  <h6 class="mb-1">Personal Email:</h6>
								  <p><?php echo $E_PEmail; ?></p>
								  <hr/>

								  <h6 class="mb-1">Marital Status:</h6>
								  <p><?php echo $E_MaritalStatus; ?></p>
								  <hr/>

								  <h6 class="mb-1">Gender:</h6>
								  <p><?php echo $E_Gender; ?></p>
								  <hr/>

								  <h6 class="mb-1">Have Employee ever been convicted by country law?:</h6>
								  <p><?php echo $E_law; ?></p>
								  <p><?php echo $E_lawDT; ?></p>
								  <hr/>

								  <h6 class="mb-1">Do Employee suffer from any long term disease/health conditions:</h6>
								  <p><?php echo $E_health; ?></p>
								  <p><?php echo $E_healthDT; ?></p>
								  <hr/>

                				</div>
                				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<?php
										$sql = "SELECT * FROM  e_family_member WHERE E_id ='$E_id'";
										$result = mysqli_query($conn,$sql);
										$i = 1;
										while($row = mysqli_fetch_array($result)){

							          echo '
										<div class="d-flex flex-column">
											<a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
												<div class="w-100">
													<div class="d-flex justify-content-between">
														<h6 class="text-body mb-2">'.$row["FM_Name"].'</h6>
													</div>
													<p class="text-muted tx-13"><b>Relationship - </b> '.$row["FM_Relationship"].' </p>
													<p class="text-muted tx-13"><b>Age - </b> '.$row["FM_Age"].' </p>
													<p class="text-muted tx-13"><b>Occupation - </b> '.$row["FM_Occupation"].' </p>
												</div>
											</a>
										</div>';
							        $i++; }
										?>
                				</div>
                				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
									<?php
										$sql = "SELECT * FROM  edu_qualification WHERE E_id ='$E_id'";
										$result = mysqli_query($conn,$sql);
										$i = 1;
										while($row = mysqli_fetch_array($result))
											{
												echo '
												<div class="d-flex flex-column">
												<a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">

													<div class="w-100">
														<div class="d-flex justify-content-between">
															<h6 class="text-body mb-2">'.$row["Qualification"].' - '.$row["Major"].'</h6>

														</div>
														<p class="text-muted tx-13"><b>Institute / School - </b> '.$row["Institute"].' </p>
														<p class="text-muted tx-13"><b>Year Pass out - </b> '.$row["Year"].' </p>
														<p class="text-muted tx-13"><b>Result - </b> '.$row["Result"].' </p>
													</div>
												</a>
												<br/>
											</div>';
											$i++; }
										?>
								</div>
							<div class="tab-pane fade" id="disabled" role="tabpanel" aria-labelledby="disabled-tab">
								<div class="d-flex flex-column">
									<a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">

										<div class="w-100">
											<div class="d-flex justify-content-between">
												<h6 class="text-body mb-2"><?php echo $E_emergency_Name?></h6>

											</div>
											<p class="text-muted tx-13"><b>Relationship - </b> <?php echo $E_emergency_Reletionship;?> </p>
											<p class="text-muted tx-13"><b>contact - </b> <code><b><?php echo $E_emergency_CNumber;?></b> </code></p>

										</div>
									</a>
								</div>
                			</div>

								<div class="tab-pane fade" id="Leave" role="tabpanel" aria-labelledby="disabled-tab">
									<div class="d-flex flex-column">
									<a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">

										Leave Managemnt
									</a>
								</div>
                </div>

								<div class="tab-pane fade" id="Attendance" role="tabpanel" aria-labelledby="disabled-tab">
									<div class="d-flex flex-column">
									<a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">

										Attendance Managemnt
									</a>
								</div>
                </div>

								<div class="tab-pane fade" id="Doc" role="tabpanel" aria-labelledby="contact-tab">
									<?php
										$sql = "SELECT * FROM   emp_documents WHERE E_id ='$E_id'" ;
										$result = mysqli_query($conn,$sql);
										$i = 1;
										while($row = mysqli_fetch_array($result))
											{

												echo '

												<div class="d-flex flex-column">


													<div class="w-100">
														<div class="d-flex justify-content-between">
															<h6 class="text-body mb-2">'.$row["DocumentName"].'</h6>
															<a href="'.$row["DocumentPath"].'"><button type="button" class="btn btn-success">Downlaod</button></a>
														</div>


													</div>

												<br/>
											</div>';
											$i++; }
										?>
                </div>



								<div class="tab-pane fade" id="JobHis" role="tabpanel" aria-labelledby="contact-tab">
									<?php
										$sql = "SELECT * FROM   employmentshis WHERE E_id ='$E_id' ORDER BY Emphis_id DESC" ;
										$result = mysqli_query($conn,$sql);
										$i = 1;
										while($row = mysqli_fetch_array($result))
											{

												echo '

												<div class="d-flex flex-column">
												<a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">

													<div class="w-100">
														<div class="d-flex justify-content-between">
															<h6 class="text-body mb-2">'.$row["Position"].'</h6>

														</div>
														<p class="text-muted tx-13"><b>'.$row["Company"].' </b></p>
														<p class="text-muted tx-13"><b>'.$row["JobStarted"].' - '.$row["JobEnd"].'</b></p>
														<p class="text-muted tx-13"><b>Reason for Leaving - </b> '.$row["ReasonLeaving"].' </p>
													</div>
												</a>
												<br/>
											</div>';
											$i++; }
										?>
                </div>

								<div class="tab-pane fade" id="Attendance" role="tabpanel" aria-labelledby="disabled-tab">
									<div class="d-flex flex-column">
									<a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">

										Attendance Managemnt
									</a>
								</div>
                </div>

								<div class="tab-pane fade" id="Attendance" role="tabpanel" aria-labelledby="disabled-tab">
									<div class="d-flex flex-column">
									<a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">

										Attendance Managemnt
									</a>
								</div>
                </div>

              </div>
            </div>
            </div>
          </div>
          <!-- middle wrapper end -->

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
	<script src="assets/vendors/prismjs/prism.js"></script>
	<script src="assets/vendors/clipboard/clipboard.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>
