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
  
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
	
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
      <!-- partial -->

			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            			<li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i> Birthday List</a></li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            	<div class="card">
              <div class="card-body">

				<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
				 <div>
					 <h4 class="mb-3 mb-md-0">Birthday List</h4>
				 </div>
			 </div>

                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Department</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php
		                    $sql = 'SELECT * FROM  b_employees
								INNER JOIN company
								ON b_employees.E_Company = company.C_id
								INNER JOIN department
								ON b_employees.E_Department = department.D_id
								WHERE b_employees.E_Active_no = 0
								';

								$result = mysqli_query($conn,$sql);
								$i = 1;
								while($row = mysqli_fetch_array($result))
		                      {
	                     ?>
                      <tr>
                        <td class="py-1">
							<?php
								$E_Image = $row['E_Image'];
								if ($E_Image == null) {
									$E_Image = "empty.png";
								}
							?>
                            <img src="assets/images/employees_images/<?php echo $E_Image; ?>" alt="image">
						</td>
                        <td><?php echo $row['E_Fname']; ?> <?php echo $row['E_Lname']; ?></td>
                        <td><?php echo $row['E_Bday'] ?></td>
                        <td><?php echo $row['E_Position'] ?></td>
                        <td><?php echo $row['C_name'] ?></td>
                        <td><?php echo $row['Department_Name'] ?></td>
                        <td><a href="View-Employee.php?view_Employee=<?php echo $row['E_id']; ?>"><button type="button" class="btn btn-success">View</button></a></td>
<!--					<td></td>-->
                      </tr>
						<?php $i++; } ?>
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

	<!-- End custom js for this page -->

</body>

<!-- add emp modal -->
</html>
