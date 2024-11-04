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
            <li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i> System User List</a></li>

					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="card-title">System User List</h6>
                  </div>
                  <div class="col-md-6" align="right">
                    <h6 class="card-title"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button></h6>

                  </div>

                </div>
                <br/>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Email</th>

                        <th>Created Date</th>
                        <th>User Level</th>
												<th>User Status</th>

                    		<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
											<?php
		                    $sql = 'SELECT * FROM  user';
		                    $result = mysqli_query($conn,$sql);
		                    $i = 1;
		                    while($row = mysqli_fetch_array($result))
		                      {
	                     ?>
                      <tr>

                        <td><?php echo $row['EU_email']; ?></td>

                        <td><?php echo $row['Created_Date'] ?></td>
                        <td>
													<?php
														if ($row['U_level'] == '0') {
															echo' <span class="badge bg-success">Supper Admin</span>';
														}elseif ($row['U_level'] == '1') {
															echo' <span class="badge bg-info">Admin</span>';
														}elseif ($row['U_level'] == '2') {
															echo' <span class="badge bg-primary">Manager</span>';
														}else {
															echo' <span class="badge bg-warning">User</span>';
														}
													?>
												</td>
												<td>
													<?php
													if ($row['U_Status'] == '0') {
														echo' <span class="badge bg-success">Active</span>';
													}else {
														echo' <span class="badge bg-danger">Deactivate</span>';
													}

													?>

												 </td>


                        <td><a href="View-System-user.php?view_user=<?php echo $row['U_id']; ?>"><button type="button" class="btn btn-primary">View & Edit</button></a></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
			<form method="post" enctype="multipart/form-data" action="">
      <div class="modal-body">
				<div class="mb-3">
								<label for="exampleInputUsername1" class="form-label">Email</label>
								<input type="email" class="form-control" id="exampleInputUsername1" name="EU_email" autocomplete="off" placeholder="User Email" required>
				</div>
				<div class="mb-3">
								<!-- <label for="exampleInputUsername1" class="form-label">Email</label> -->
								<input type="email" class="form-control"   placeholder="User Email" hidden>
				</div>
					<!-- *********************************** -->
					<div class="mb-3">
								<input type="Password" class="form-control"  onkeyup='check()' autocomplete="off" placeholder="User Password" hidden>
					</div>
					<div class="mb-3">
								<label for="exampleInputUsername1" class="form-label">Password</label>
								<input type="Password" class="form-control" id="password" onkeyup='check()' autocomplete="off" placeholder="User Password" name="Epw" required>
					</div>

						<div class="mb-3">
											<label for="exampleInputUsername1" class="form-label">Re-Enter Password</label>
											<input type="Password" class="form-control" id="checkPassword" onkeyup='check()' autocomplete="off" placeholder="Re-Enter Password" name="E_password" required>
							</div>
							<p id="alertPassword"></p>

							<div class="mb-3">
												<label for="exampleInputUsername1" class="form-label">User Level</label>
												<select class="form-select" id="exampleFormControlSelect1" name="U_level" required>
													<option value="3">User</option>
													<option value="2">Manager</option>
													<option value="1">Admin</option>
														<option value="0">Supper Admin</option>
											</select>
								</div>
      </div>
			<input type="hidden" value="<?php echo $session_id?>" name="Created_by">
			<?php $uad = date("Y-m-d"); ?>
			<input type="hidden" value="<?php echo $uad;?>" name="Created_Date">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Add_NU">Add User</button>
			</form>
			<?php include_once 'PHP/WRITE/add_System-User-script.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
var check = function() {
	 if (document.getElementById('password').value ==
			 document.getElementById('checkPassword').value && !(document.getElementById('password').value=='')) {
			 document.getElementById('alertPassword').style.color = '#8CC63E';
			 document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-check-circle"></i>Match !</span>';
	 } else {
			 document.getElementById('alertPassword').style.color = '#EE2B39';
			 document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i>Not matching !</span>';
	 }
}
</script>

<!-- add emp modal -->
</html>
