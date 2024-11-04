<?php

$select_admin = "SELECT * FROM user WHERE U_id ='$session_id'";
$run_query = mysqli_query($conn,$select_admin);
while ($row_post = mysqli_fetch_array($run_query)){
  $U_id = $row_post ['U_id'];
  $EU_email = $row_post ['EU_email'];
  $U_level = $row_post ['U_level'];
  $E_id  = $row_post ['E_id'];
}
$SE_id = $E_id;

?>

<nav class="navbar">
  <a href="dashboard.php" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">

    <ul class="navbar-nav">



      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="bell"></i>
          <div class="indicator">
            <div class="circle"></div>
          </div>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
          <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
            <p>6 New Notifications</p>
            <a href="javascript:;" class="text-muted">Clear all</a>
          </div>
          <div class="p-1">
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="gift"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>New Order Recieved</p>
                <p class="tx-12 text-muted">30 min ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="alert-circle"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Server Limit Reached!</p>
                <p class="tx-12 text-muted">1 hrs ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <img class="wd-30 ht-30 rounded-circle" src="../assets/images/faces/face6.jpg" alt="userr">
              </div>
              <div class="flex-grow-1 me-2">
                <p>New customer registered</p>
                <p class="tx-12 text-muted">2 sec ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="layers"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Apps are ready for update</p>
                <p class="tx-12 text-muted">5 hrs ago</p>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="download"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Download completed</p>
                <p class="tx-12 text-muted">6 hrs ago</p>
              </div>
            </a>
          </div>
          <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
            <a href="javascript:;">View all</a>
          </div>
        </div>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php

            if ($SE_id == '0') {
              echo '<img class="wd-30 ht-30 rounded-circle" src="assets/images/employees_images/admin-icon.png" alt="profile">';
            } else {

              $select_admin = "SELECT * FROM  b_employees WHERE E_id ='$SE_id'";
              $run_query = mysqli_query($conn,$select_admin);
              while ($row_post = mysqli_fetch_array($run_query)){
                $E_Image = $row_post ['E_Image'];
              }

                echo'<img class="wd-30 ht-30 rounded-circle" src="assets/images/employees_images/'.$E_Image.'" alt="profile">';
            }
          ?>

        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              <?php
              if ($SE_id == '0') {
                echo '<img class="wd-80 ht-80 rounded-circle" src="assets/images/employees_images/admin-icon.png" alt="">';
              }else {
                $select_admin = "SELECT * FROM  b_employees WHERE E_id ='$SE_id'";
                $run_query = mysqli_query($conn,$select_admin);
                while ($row_post = mysqli_fetch_array($run_query)){
                  $E_Image = $row_post ['E_Image'];
                }
                echo'<img class="wd-80 ht-80 rounded-circle" src="assets/images/employees_images/'.$E_Image.'">';
              }
              ?>

            </div>
            <div class="text-center">
              <?php
              if ($SE_id == '0') {

                  if ($U_level == '0') {
                    echo '<p class="tx-16 fw-bolder">Supper Admin</p>';
                  } elseif ($U_level == '1') {
                    echo '<p class="tx-16 fw-bolder">Admin</p>';
                  }elseif ($U_level == '2') {
                    echo '<p class="tx-16 fw-bolder">Manager</p>';
                  }else {
                    echo '<p class="tx-16 fw-bolder">User</p>';
                  }
              }else {
                $select_admin = "SELECT * FROM  b_employees WHERE E_id ='$SE_id'";
                $run_query = mysqli_query($conn,$select_admin);
                while ($row_post = mysqli_fetch_array($run_query)){
                  $E_Fname = $row_post ['E_Fname'];
                  $E_Lname = $row_post ['E_Lname'];
                }
                echo '<p class="tx-16 fw-bolder">'.$E_Fname.' '.$E_Lname.'</p>';
              }
              ?>

              <p class="tx-12 text-muted"><?php echo $EU_email;?></p>
            </div>
          </div>
          <ul class="list-unstyled p-1">
            <?php
            if (!($E_id == 0)) {
              echo '
              <li class="dropdown-item py-2">
                <a href="view-profile.php?view_user='. $E_id .'" class="text-body ms-0">
                  <i class="me-2 icon-md" data-feather="user"></i>
                  <span>Profile</span>
                </a>
              </li>
              ';
            }
             ?>


          <a href="include/logout.php">
            <li class="dropdown-item py-2">
            <div class="text-body ms-0">
              <i class="me-2 icon-md" data-feather="log-out"></i>
              <span>Log Out</span>
            </li>
          </a>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
