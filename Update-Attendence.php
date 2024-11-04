<?php ob_start();?>
<?php include 'include/dbConnection.php';?>
<?php include 'include/session.php';?>
<?php
$result=mysqli_query($conn, "select U_id from user where U_id='$session_id'")or die('Error In Session');
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
            <li class="breadcrumb-item"><i data-feather="chevron-right"></i><a href="View-Emp-Attendence.php">Employee Attendence</a></li>
						<li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i>Update Attendence</a></li>

					</ol>
				</nav>

				<div class="row">
				<div class="col-md-12 stretch-card">
					<div class="card">
						<div class="card-body">
							<?php
								$attendence_id = $_GET['view_attendence'];
								$sql = "SELECT * FROM `emp_attendence` WHERE attendence_id=$attendence_id";
								$result = mysqli_query($conn, $sql);
								$result =mysqli_fetch_assoc($result);
                                $Emp_Id = $result['E_Id'];

                                $getReleventEmployee = mysqli_query($conn, "SELECT * FROM b_employees WHERE E_id = '$Emp_Id'");
                                $getReleventEmployee = mysqli_fetch_assoc($getReleventEmployee);
                            ?>
							<h6 class="card-title">Update Attendence</h6>
							<!-- <h6 class="card-title"><?php // echo $result['FP_Id'];?> - <?php // echo $getReleventEmployee['E_Fname'];?> <?php // echo $getReleventEmployee['E_Lname'];?></h6> -->
								<form method="post" enctype="multipart/form-data" action="">
									<div class="row">
										<div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label">Employee</label>
												<select  name="selectedEmployee" class="form-select" required>
                                                    <option value="<?php echo $result['FP_Id']; ?>" selected><?php echo $result['FP_Id'];?> - <?php echo $getReleventEmployee['E_Fname'];?> <?php  echo $getReleventEmployee['E_Lname'];?></option>
                                                    <?php
                                                        $getEmployees = "SELECT * FROM b_employees WHERE FP_Id > 0";
                                                        $getEmployeesResult = mysqli_query($conn, $getEmployees);
                                                        while ($row = mysqli_fetch_array($getEmployeesResult)) {
                                                    ?>
                                                        <option value="<?php echo $row['FP_Id'] ?>"><?php echo $row['FP_Id'] ?> - <?php echo $row['E_Fname'] ?> <?php echo $row['E_Lname'] ?></option>
                                                    <?php } ?>
                                                </select>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="mb-3">
												<label class="form-label">Date</label>
												<input name="attendenceDate" type="date" value="<?php echo $result['FP_Date']; ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
											</div>
										</div>
                                        <div class="col-lg-6">
										<label class="form-label" for="formFile">Check In Location</label>
                                            <select  name="selectedCheckInLocation" class="form-select" required>
                                            <?php
                                                    $checkInLocationId=$result['checkIn_location'];
                                                    if ($checkInLocationId == '') {
                                                        ?>
                                                        <option value="0" selected></option>
                                                        <?php
                                                    } else {
                                                        $getCheckInLocation = "SELECT * FROM location WHERE location_id = '$checkInLocationId'";
                                                        $getCheckInLocationResult = mysqli_query($conn, $getCheckInLocation);
                                                        $getCheckInLocationResult = mysqli_fetch_assoc($getCheckInLocationResult);

                                                ?>
                                                    <option value="<?php echo $getCheckInLocationResult['location_id'];?>" selected><?php echo $getCheckInLocationResult['location_name'];?></option>
                                                <?php } ?>
                                                <!-- <option value="0" selected><?php // echo $result['checkIn_location'];?></option> -->
                                            <?php
                                                $getLocations = "SELECT * FROM location WHERE act_status = 1";
                                                $getLocationsResult = mysqli_query($conn, $getLocations);
                                                while ($row = mysqli_fetch_array($getLocationsResult)) {
                                            ?>
                                                <option value="<?php echo $row['location_id'] ?>"><?php echo $row['location_name'] ?></option>
                                            <?php } ?>
                                            </select>
									    </div>
                                        <div class="col-lg-6">
										<label class="form-label" for="formFile">Check Out Location</label>
                                            <select  name="selectedCheckOutLocation" class="form-select" required>
                                                <?php
                                                    $checkOutLocationId=$result['checkOut_location'];
                                                    if ($checkOutLocationId == '') {
                                                        ?>
                                                        <option value="0" selected></option>
                                                        <?php
                                                    } else {
                                                        $getCheckOutLocation = "SELECT * FROM location WHERE location_id = '$checkOutLocationId'";
                                                        $getCheckOutLocationResult = mysqli_query($conn, $getCheckOutLocation);
                                                        $getCheckOutLocationResult = mysqli_fetch_assoc($getCheckOutLocationResult);

                                                ?>
                                                    <option value="<?php echo $getCheckOutLocationResult['location_id'];?>" selected><?php echo $getCheckOutLocationResult['location_name'];?></option>
                                                <?php } ?>
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
                                            <label class="form-label" for="formFile">Check In Time</label>
                                            <input name="startTime" type="time" value="<?php echo $result['FP_Start_Time']; ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" step="1" required>
									    </div>
                                        <div class="mt-3 col-lg-6">
                                            <label class="form-label" for="formFile">Check Out Time</label>
                                            <input name="endTime" type="time" value="<?php echo $result['FP_End_Time']; ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" step="1" required>
                                        </div>

									</div>
									<input type="hidden" value="<?php echo $attendence_id;?>" name="att_id">
									<input type="hidden" value="<?php echo $Emp_Id;?>" name="emp_id">
									<button type="submit" name="update_attendence" class="mt-3 btn btn-primary submit">Update</button>
									</form>

									<?php include 'PHP/WRITE/update-attendence-script.php';?>
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

	<!-- End custom js for this page -->

</body>

<!-- add company modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">

				<form action="" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-12">
							<div class="mb-3">
								<label class="form-label">Company Name</label>
								<input type="text" class="form-control" name="C_name" placeholder="Enter Company name" required/>
							</div>
					</div><!-- Col -->

					<div class="col-sm-12">
							<div class="mb-3">
								<label class="form-label">EPF No</label>
								<input type="text" class="form-control" name="C_EPFNo" placeholder="Enter EPF No" required/>
							</div>
					</div><!-- Col -->

					<!-- <div class="col-sm-12">
							<div class="mb-3">
								<label class="form-label">Company Logo</label>
								<input type="file" class="form-control" name="C_Logo"/>
							</div>
					</div>Col -->

				</div>

			</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_Company">Add</button>
				</form>
      </div>
    </div>
  </div>
</div>
<?php include 'PHP/WRITE/addCompany_Script.php';?>
</html>
