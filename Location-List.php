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
            <li class="breadcrumb-item active" aria-current="page"><i data-feather="chevron-right"></i> Location List</a></li>


					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="card-title">Location List</h6>
                  </div>
                  <div class="col-md-6" align="right">
                    <h6 class="card-title"><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Location</button></h6>
                  </div>

                </div>
                <br/>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Location Name</th>
                      	<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
		                    $sql = 'SELECT * FROM  location WHERE act_status = 1';
		                    $result = mysqli_query($conn,$sql);
		                    $i = 1;
		                    while($row = mysqli_fetch_array($result))
                        {
                          ?>
                      <tr>
                        <td><?php echo $row['location_name']; ?></td>
                        <td>
            <form id="deleteForm" method="post" action="">
							<a href="update-location-list.php?view_location=<?php echo $row['location_id']; ?>"><button type="button" name="view_location" class="btn btn-primary">Edit</button></a>
              <input type="hidden" id="locationId" name="L_id" value="<?php echo $row['location_id']; ?>">
              <input type="hidden" name="delete_location">
							<button type="button" id="deleteBtn<?php echo $i; ?>" name="delete_location" value="<?php echo $row['location_id']; ?>" onclick="deleteloc(<?php echo $i; ?>)" class="btn btn-danger">Delete</button>

            </form>
						</td>
          </tr>
          <?php $i++; } ?>

        </tbody>
      </table>
      <?php // include 'PHP/WRITE/add_location_script.php';?>
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>
      <script>
             function deleteloc(index) {
              // document.getElementById('delete_button').addEventListener('click', function() {
                // console.log(index);
                var deleteBtnId = 'deleteBtn' + index;
                var id = document.getElementById(deleteBtnId).value;

                Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this location!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "PHP/WRITE/delete-location-script.php",
                        data: {L_id:id},
                        success: function (response) {
                            // alert(response.status);
                            // document.getElementById('deleteForm').submit();
                              Swal.fire({
                              title: 'Deleted!',
                              text: 'Your file has been deleted.',
                              icon: 'success'
                              }).then((result) => {
                                  window.location.href = 'Location-List.php';
                              });

                        },
                        error: function (xhr, status, error) {
                            // alert("error");
                            alert("AJAX error:"+ error);
                            // console.log("AJAX error:",xhr, status, error);
                        }
                    });
                  }
              });
              // })
            }
          </script>

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
								<label class="form-label">Location Name</label>
								<input type="text" class="form-control" name="L_name" placeholder="Enter Location name" required/>
							</div>
					</div>
				</div>

			</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_location">Add</button>
				</form>
      </div>
    </div>
  </div>
</div>
<?php include 'PHP/WRITE/add_location_script.php';?>
<?php // include 'PHP/WRITE/delete-location-script.php';?>

</html>
