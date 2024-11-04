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

  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">

	<link rel="stylesheet" href="assets/vendors/core/core.css">

	<link rel="stylesheet" href="assets/vendors/prismjs/themes/prism.css">

	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">

	<link rel="stylesheet" href="assets/css/demo1/style.min.css">

  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">
    <?php include_once 'include/side-navi.php' ?>
    <?php include_once 'include/top_navi.php' ?>


		<div class="page-wrapper">

			<div class="page-content">

				<?php include 'PHP/READ/view-user-profile-script.php'; ?>

        <div class="row">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="position-relative">
                <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                  <img src="assets/images/profile-cover.jpg"class="rounded-top" alt="profile cover">
                </figure>
                <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                  <div>
                    <img class="wd-70 rounded-circle" src="assets/images/employees_images/<?php echo $E_Image ?>" alt="profile">
                    <span class="h4 ms-3 text-dark"><?php echo $E_Fname; ?> <?php echo $E_Lname; ?></span>
                  </div>
                  <!-- <div class="d-none d-md-block">
                    <button class="btn btn-primary btn-icon-text">
                      <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                    </button>
                  </div> -->
                </div>
              </div>
              <div class="d-flex justify-content-center p-3 rounded-bottom">
                <ul class="d-flex align-items-center m-0 p-0">
                  <li class="ms-3 ps-3 d-flex align-items-center" href="#PersonalSection">
                    <i class="me-1 icon-md text-primary" data-feather="user" href="#PersonalSection"></i>
                    <a class="pt-1px d-none d-md-block text-primary" href="#PersonalSection">Personal</a>
                  </li>

                  <li class="ms-3 ps-3 border-start d-flex align-items-center">
                    <i class="me-1 icon-md" data-feather="user"></i>
                    <a class="pt-1px d-none d-md-block text-body" href="#FamilySection">Family</a>
                  </li>
                  <li class="ms-3 ps-3 border-start d-flex align-items-center">
                    <i class="me-1 icon-md" data-feather="user"></i>
                    <a class="pt-1px d-none d-md-block text-body" href="#EducationSection">Education</a>
                  </li>
                  <li class="ms-3 ps-3 border-start d-flex align-items-center">
                    <i class="me-1 icon-md" data-feather="user"></i>
                    <a class="pt-1px d-none d-md-block text-body" href="#EmergencySection">Emergency</a>
                  </li>
                  <li class="ms-3 ps-3 border-start d-flex align-items-center">
                    <i class="me-1 icon-md" data-feather="user"></i>
                    <a class="pt-1px d-none d-md-block text-body" href="#DocumentSection">Doc</a>
                  </li>
                  <li class="ms-3 ps-3 border-start d-flex align-items-center">
                    <i class="me-1 icon-md" data-feather="user"></i>
                    <a class="pt-1px d-none d-md-block text-body" href="#JobHistorySection">Job-His</a>
                  </li>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="col-md-12 col-xl-12 left-wrapper" id="PersonalSection">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h6 class="card-title mb-0">Personal</h6>
                </div>
                <!-- <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p> -->
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Full Name:</label>
                  <p class="text-muted"><?php echo $E_Sname; ?> <?php echo $E_Fname; ?> <?php echo $E_Mname; ?> <?php echo $E_Lname; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Date of Birth:</label>
                  <p class="text-muted"><?php echo $E_Bday; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Age:</label>
                  <p class="text-muted">me@nobleui.com</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">NIC:</label>
                  <p class="text-muted"><?php echo $E_NIC; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Religion:</label>
                  <p class="text-muted"><?php echo $E_Religion; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Personal Address (Permanent):</label>
                  <p class="text-muted"><?php echo $E_PAddress; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Temporary Address:</label>
                  <p class="text-muted"><?php echo $E_TAddress; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Mobile Number:</label>
                  <p class="text-muted"><?php echo $E_Mobile; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Land Number:</label>
                  <p class="text-muted"><?php echo $E_Landno; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Personal Email:</label>
                  <p class="text-muted"><?php echo $E_PEmail; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Martial Status:</label>
                  <p class="text-muted"><?php echo $E_MaritalStatus; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Gender:</label>
                  <p class="text-muted"><?php echo $E_Gender; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Have Employee ever been convicted by country law?:</label>
                  <p class="text-muted"><?php echo $E_law; ?></p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Do Employee suffer from any long term disease/health conditions:</label>
                  <p class="text-muted"><?php echo $E_health; ?></p>
                </div>
              </div>
            </div>
          </div>


					<div class="mt-3 col-md-12 col-xl-12 left-wrapper" id="EmploymentSection">
						<div class="card rounded">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-2">
									<h6 class="card-title mb-0">Employement</h6>
								</div>

										<div class="mt-3">
												<p class="text-muted"><strong>Position:</strong> <?php echo $E_Position ?></p>
												<p class="text-muted"><strong>Company: </strong><?php echo $E_Company ?></p>
												<p class="text-muted"><strong>Status: </strong><?php echo $E_Department ?></p>
												<p class="text-muted"><strong>Status: </strong><?php echo $E_Status ?></p>
												<p class="text-muted"><strong>Office Number: </strong><?php echo $E_Cmobile ?></p>
										</div>

							</div>
						</div>
					</div>


          <div class="mt-3 col-md-12 col-xl-12 left-wrapper" id="FamilySection">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h6 class="card-title mb-0">Family</h6>
                </div>

								<?php
								$sql = "SELECT * FROM e_family_member WHERE E_id = '$E_id'";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_array($result)) {
								    ?>
								    <div class="mt-3">
								        <label class="tx-11 fw-bolder mb-0 text-uppercase"><?php echo $row['FM_Name']; ?></label>
								        <p class="text-muted">Relationship: <?php echo $row['FM_Relationship']; ?></p>
								        <p class="text-muted">Age: <?php echo $row['FM_Age']; ?></p>
								        <p class="text-muted">Occupation: <?php echo $row['FM_Occupation']; ?></p>
								        <hr>
								    </div>
								    <?php
								}
								?>
              </div>
            </div>
          </div>



          <div class="mt-3 col-md-12 col-xl-12 left-wrapper" id="EducationSection">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h6 class="card-title mb-0">Education</h6>
                </div>
							<?php
								$sql = "SELECT * FROM edu_qualification WHERE E_id = $E_id";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_array($result)) {
								?>
								<div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase"><?php echo $row['Qualification'];?> - <?php echo $row['Major'];?></label>
                  <p class="text-muted"><?php echo $row['Institute'];?></p>
                  <p class="text-muted"><?php echo $row['Year'];?></p>
                  <p class="text-muted"><?php echo $row['Result'];?></p>
                <hr>
                </div>
								<?php } ?>
              </div>
            </div>
          </div>




          <div class="mt-3 col-md-12 col-xl-12 left-wrapper" id="EmergencySection">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h6 class="card-title mb-0">Emergency</h6>
                </div>

								<div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase"><?php echo $E_emergency_Name ?></label>
                  <p class="text-muted"><?php echo $E_emergency_Reletionship ?></p>
                  <p class="text-muted"><?php echo $E_emergency_CNumber ?></p>
                </div>
              </div>
            </div>
          </div>


          <div class="mt-3 col-md-12 col-xl-12 left-wrapper" id="DocumentSection">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h6 class="card-title mb-0">Doc</h6>
                </div>

								<?php
								$sql = "SELECT * FROM emp_documents WHERE E_id ='$E_id'";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_array($result)) {
									?>

                <div class="mt-3">
                  <div class="col-auto">
                    <label class="tx-12 mb-0 text-uppercase"><?php echo $row['DocumentName'];  ?></label>
                  </div>
                  <div class="col-auto mt-1">
                  <a href="<?php echo $row['DocumentPath']; ?>"><button type="button" class="btn btn-primary">Download</button></a>
                </div>
                <hr  class="col-12 mt-2">
                </div>
							<?php	} ?>
              </div>
            </div>
          </div>



          <div class="mt-3 col-md-12 col-xl-12 left-wrapper" id="JobHistorySection">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h6 class="card-title mb-0">Job-His</h6>
                </div>

								<?php
								$sql = "SELECT * FROM employmentshis WHERE E_id ='$E_id' ORDER BY Emphis_id DESC";
								$result = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_array($result)) {
								 ?>
                <div class="mt-3">
                    <label class="tx-12 mb-0 text-uppercase"><?php echo $row['Position']; ?></label>
										<p class="text-muted"><?php echo $row['Company']; ?></p>
                    <p class="text-muted"><?php echo $row['JobStarted']; ?> to <?php echo $row['JobEnd']; ?></p>
                    <p class="text-muted"><b>Reason for Leaving - </b> <?php echo $row['ReasonLeaving']; ?></p>
                    <hr  class="col-12 mt-2">
                </div>
								<?php	} ?>
              </div>
            </div>
          </div>
          <!-- right wrapper end -->
        </div>

			</div>

			<!-- partial:../../partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a>Copyright © 2023 - 2024 Blue Ocean Group of Companies.</a>.</p>
				<p class="text-muted">HR PORTAL <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->

		</div>
	</div>

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

</body>

<!-- Mirrored from www.nobleui.com/html/template/demo1/pages/general/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Jun 2023 04:51:24 GMT -->
</html>
