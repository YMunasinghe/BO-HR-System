<?php ob_start(); ?>
<?php include 'include/dbConnection.php';?>
<?php include 'include/session.php';?>

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
            <li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i> Department List</a></li>


					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="card-title">Department List</h6>
                  </div>
                  <div class="col-md-6" align="right">
                    <a href="add_site.php"><h6 class="card-title"><button type="button" class="btn btn-outline-success">Add Department</button></h6></a>

                  </div>

                </div>
                <br/>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>

												<th>Prjoect /Site Name</th>
												<th>Department Name</th>
                        <th>Company</th>
                      	<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
											<?php
											$sql = 'SELECT * FROM site
															JOIN company ON company.C_id = site.company
															JOIN department ON department.D_id = site.department';
		                    $result = mysqli_query($conn,$sql);
		                    $i = 1;
		                    while($row = mysqli_fetch_array($result))
		                      {
	                     ?>

                      <tr>

												<td><?php echo $row['Site_Name']; ?></td>
												<td><?php echo $row['Department_Name']; ?></td>
                        <td><?php echo $row['C_name']; ?></td>
												<td>
													<a href="update-department.php?view_department=<?php echo $row['D_id']; ?>"><button type="button" class="btn btn-primary">Edit</button>
												</td>
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

<!-- add company modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
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
