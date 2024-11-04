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

	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">

	<link rel="stylesheet" href="assets/vendors/core/core.css">

	<!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css"> -->
	<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="assets/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">

	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

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
            			<li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i>Employee Attendence</a></li>
					</ol>
				</nav>

                <div class="card">
					<div class="card-body">
						<form method="get" id="filterForm" action="PHP/READ/filter-collection-script.php" enctype="multipart/form-data">
						<div class="row row-cols-1 g-3 row-cols-lg-auto align-items-center">
							 <div class="col">
							 <label class="form-label">Select Employee</label>
								 <select id="EmployeeId" class="form-select" name="EmployeeId">
								 <option selected>Employee</option>
								 <?php
								 	$getEmployees = "SELECT * FROM b_employees WHERE FP_Id > 0";
									$getEmployeesResult = mysqli_query($conn, $getEmployees);
									while ($employee_row = mysqli_fetch_array($getEmployeesResult)) {
								 ?>
									<option value="<?php echo $employee_row['FP_Id']; ?>"><?php echo $employee_row['FP_Id']; ?> <?php echo $employee_row['E_Fname']; ?> <?php echo $employee_row['E_Lname']; ?></option>
								<?php } ?>
								</select>
							 </div>

						 <div class="col">
						 <label class="form-label">Start Date</label>
						 <input type="date" class="form-control" placeholder="Start Date" id="Start_Date" name="Start_Date"/>
						 </div>
						 <div class="col">
						 <label class="form-label">End Date</label>
						 <input type="date" class="form-control" placeholder="End Date" id="End_Date" name="End_Date"/>
						 </div>

						 <div class="col">
						 <label class="form-label">Location</label>
							 <select id="location_select" class="form-select" name="selected_location">
									<option selected>Location</option>
									<?php
									 $result = mysqli_query($conn, "SELECT * FROM location WHERE act_status = 1");
									 while ($row = mysqli_fetch_array($result)) {
											?>
											<option value="<?php echo $row['location_id']; ?>"> <?php echo $row["location_name"]; ?></option>
									<?php } ?>
							</select>
						 </div>

						 <div class="col">
							 <label class="form-label">Department</label>
							 <select id="Department" class="form-select" name="Department">
								 <option selected>Department</option>
								 <?php
										$getDepartments = mysqli_query($conn, "SELECT * FROM department INNER JOIN company ON department.company = company.C_id");
										while ($row = mysqli_fetch_array($getDepartments)) {
									?>
									<option value="<?php echo $row['Department_Name'];?>"> <?php echo $row['Department_Name'];?> - <?php  echo $row['C_name'];?></option>
									<?php }?>
						 </select>
				    	</div>
					</div>
					<div class="col mt-2">
						<!-- <label class="form-label"></label> -->
						<button type="button" onclick="submitFormAndNavigate()" class="btn btn-primary px-4">Filter</button>
					</div>
			</form>
			<script>
				function submitFormAndNavigate() {
					var EmployeeId=document.getElementById('EmployeeId').value;
					var StartDate=document.getElementById('Start_Date').value;
					var EndDate=document.getElementById('End_Date').value;
					var SelectedLocation=document.getElementById('location_select').value;
					var Department=document.getElementById('Department').value;

						var filterForm = document.getElementById('filterForm');
						filterForm.name="getFilterValues";
						filterForm.submit();

						// window.location.href = 'View-Emp-Attendence.php?viewattendence=true&EmployeeId='+EmployeeId+'&StartDate'=StartDate+'&EndDate'=EndDate+'&Department='+Department;
						window.location.href = 'View-Emp-Attendence.php?viewattendence=true&EmployeeId=' + EmployeeId + '&StartDate=' + StartDate + '&EndDate=' + EndDate + '&Location='+ SelectedLocation + '&Department=' + Department;
				}
			</script>

			<?php include_once 'PHP/READ/view-attendence-script.php'?>
					</div>
			</div>

				<div class="row">
					<div class="mt-4 col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">

				<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
				 <div>
					 <h4 class="mb-3 mb-md-0">Employee Attendence</h4>
				 </div>

			 </div>

                <div class="table-responsive">
                  <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Emp/EPF No</th>
                        <th>FP Id</th>
                        <th>Phone No.</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Check In Location</th>
                        <th>Check In Time</th>
						<th>Check Out Location</th>
                        <th>Check Out Time</th>
                    	<th>Total Hours</th>
                    	<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php
		            foreach ($dataArray as $row) {
							$EImage = $row['E_Image'];
							if($EImage==null) {
								$EImage="empty.png";
							}
	                     ?>
                      <tr>
                        <td class="py-1">
                            <img src="assets/images/employees_images/<?php echo $EImage; ?>" alt="image">
  					    </td>
                        <td><?php echo $row['E_Fname']; ?> <?php echo $row['E_Lname']; ?></td>
                        <td><?php echo $row['EMP_No']; ?></td>
                        <td><?php echo $row['FP_Id']; ?></td>
                        <td><?php echo $row['E_Cmobile']; ?></td>
                        <td><?php echo $row['E_Department']; ?></td>
                        <td><?php echo $row['FP_Date']; ?></td>
                        <td><?php echo $row['checkIn_location']; ?></td>
                        <td><?php echo $row['FP_Start_Time']; ?></td>
						<td><?php echo $row['checkOut_location']; ?></td>
                        <td><?php echo $row['FP_End_Time']; ?></td>
                        <td><?php echo $row['Total_Hours']; ?></td>
                        <td><a href="Update-Attendence.php?view_attendence=<?php echo $row['attendence_id'];?>"><button type="button" class="btn btn-primary">Edit</button></a></td>

                      </tr>
						<?php } ?>
                    </tbody>
				</table>
			</div>
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
  	<!-- <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script-->

		<script src="assets/datatable/js/jquery.dataTables.min.js"></script>
		<script src="assets/datatable/js/dataTables.bootstrap5.min.js"></script>

	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<!-- <script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="assets/plugins/validation/jquery.validate.min.js"></script>
	<script src="assets/plugins/validation/validation-script.js"></script> -->
	<!-- End custom js for this page -->

	<script>
		$(document).ready(function() {
		  var table = $('#dataTable').DataTable( {
			buttons: ['excel'],
			lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
		  });

		  table.buttons().container()
			.appendTo('#dataTable_wrapper .col-md-6:eq(0)')
			.addClass('btn-container'); // Add a class to the buttons container

			$('.btn-container').css('margin-top', '20px');
		});
	  </script>

</body>

<!-- add emp modal -->
</html>
