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
  <link rel="stylesheet" href="assets/vendors/flatpickr/flatpickr.min.css">
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

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
          </div>

        </div>

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Total Active Employees</h6>
                      <div class="dropdown mb-2">
                        <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
												<?php
                        	$count_Processing = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM  b_employees WHERE E_Active_no='0'"));
                        ?>
                        <h3 class="mb-2"><?php echo $count_Processing[0];?></h3>
                        <div class="d-flex align-items-baseline">
                          <!-- <p class="text-success">
                            <span>+3.3%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                          </p> -->
                        </div>
                      </div>
                      <!-- <div class="col-6 col-md-12 col-xl-7">
                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Today Leave</h6>
                      <div class="dropdown mb-2">
                        <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">0</h3>
                        <!-- <div class="d-flex align-items-baseline">
                          <p class="text-danger">
                            <span>-2.8%</span>
                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                          </p>
                        </div> -->
                      </div>
                      <!-- <div class="col-6 col-md-12 col-xl-7">
                        <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Attendance</h6>
                      <div class="dropdown mb-2">
                        <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">0</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          

          <div class="col-lg-5 col-xl-6 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Today Birthdays</h6>
                </div>
                <div class="d-flex flex-column">
                  <?php 
                    $currentDate = date("m");
                    $currentMonth = date("d");
                    $getBirthdaySql = $conn->prepare("SELECT * FROM b_employees WHERE MONTH(E_Bday) = ? AND DAY(E_Bday) = ? LIMIT 3");
                    $getBirthdaySql->bind_param("ii",$currentMonth,$currentDate);
                    $getBirthdaySql->execute();
                    $getBdayResult = $getBirthdaySql->get_result();
                    if($getBdayResult->num_rows>0){
                      while($row=$getBdayResult->fetch_assoc()){ 
                        $E_Image = $row['E_Image'];
                        $E_Fname = $row['E_Fname'];
                        $E_Mname = $row['E_Mname'];
                        $E_Lname = $row['E_Lname'];
                        $E_Bday = $row['E_Bday'];
                        if ($E_Image == null) {
                          $E_Image = "empty.png";
                        }
                        ?>
                    <a class="d-flex align-items-center border-bottom pb-3 mt-2">
                      <div class="me-3">
                        <img src="assets/images/employees_images/<?php echo $E_Image; ?>" class="rounded-circle wd-35" alt="user">
                      </div>
                      <div class="w-100">
                        <div class="d-flex justify-content-between">
                          <h6 class="text-body mb-2"><?php echo $E_Fname; ?> <?php echo $E_Mname; ?> <?php echo $E_Lname; ?></h6>
                          <p class="text-muted tx-12"><?php echo $E_Bday; ?></p>
                        </div>
                        <p class="text-muted tx-13">Hey! Its my birthday...</p>
                      </div >
                    </a>
                  <?php
                      }
                    } else { ?>
                      <a class="d-flex align-items-center border-bottom pb-3">
                      <div class="w-100">
                        <p class="text-muted tx-12">No Birthdays for Today</p>
                      </div>
                    </a>
            <?php   }

                  ?>
                  
                </div>
              </div>
            </div>
          </div>




          <div class="col-lg-5 col-xl-6 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Upcoming Birthdays</h6>
                </div>
                <div class="d-flex flex-column">
                  <?php 
                    $currentMonth = date('m');
                    $currentDate = date('d');
                    $getUpcomingBirthdaySql = $conn->prepare("SELECT * 
                          FROM b_employees 
                          WHERE (MONTH(E_Bday) > ?) 
                            OR (MONTH(E_Bday) = ? AND DAY(E_Bday) > ?)
                          ORDER BY MONTH(E_Bday) ASC, DAY(E_Bday) ASC LIMIT 3
                                  ");

                    $getUpcomingBirthdaySql->bind_param("iii",$currentMonth,$currentMonth,$currentDate);
                    $getUpcomingBirthdaySql->execute();
                    $getUpcomingBdayResult = $getUpcomingBirthdaySql->get_result();
                    if($getUpcomingBdayResult->num_rows>0){
                      while($row=$getUpcomingBdayResult->fetch_assoc()){ 
                        $E_Image = $row['E_Image'];
                        $E_Fname = $row['E_Fname'];
                        $E_Mname = $row['E_Mname'];
                        $E_Lname = $row['E_Lname'];
                        $E_Bday2 = $row['E_Bday'];
                        if ($E_Image == null) {
                          $E_Image = "empty.png";
                        }
                        ?>
                    <a class="d-flex align-items-center border-bottom pb-3 mt-2">
                      <div class="me-3">
                        <img src="assets/images/employees_images/<?php echo $E_Image; ?>" class="rounded-circle wd-35" alt="user">
                      </div>
                      <div class="w-100">
                        <div class="d-flex justify-content-between">
                          <h6 class="text-body mb-2"><?php echo $E_Fname; ?> <?php echo $E_Mname; ?> <?php echo $E_Lname; ?></h6>
                          <p class="text-muted tx-12"><?php echo $E_Bday2; ?></p>
                        </div>
                        <p class="text-muted tx-13">Hey! My birthday is coming...</p>
                      </div >
                    </a>
                  <?php
                      }
                    } else { ?>
                      <a class="d-flex align-items-center border-bottom pb-3">
                      <div class="w-100">
                        <p class="text-muted tx-12">No Birthdays for the Year</p>
                      </div>
                    </a>
                  <?php   
                    }
                  ?>
                  
                </div>
                <div class="text-end mt-2">
                  <a href="Birthdays-List.php"><button type="button" class="btn btn-primary">View All</button></a>
                </div>
              </div>
            </div>
          </div>



        
          
        </div>


			</div>

			<?php include_once 'include/footer.php' ?>

		</div>
	</div>

	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="assets/vendors/flatpickr/flatpickr.min.js"></script>
  <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="assets/js/dashboard-light.js"></script>
	<!-- End custom js for this page -->

</body>
</html>
