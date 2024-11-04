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
<nav class="sidebar">
  <div class="sidebar-header">
    <a href="dashboard.php" class="sidebar-brand">
      HR<span> PORTAL</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="dashboard.php" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Employees</li>
      <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Employees" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Employees</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="Employees">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="Employees-List.php" class="nav-link">Employee List</a>
                </li>
                <li class="nav-item">
                  <a href="Add-Employee.php" class="nav-link">Register Employee</a>
                </li>

                <li class="nav-item">
                  <a href="Family-Member-management.php" class="nav-link">Family Member</a>
                </li>

                <li class="nav-item">
                  <a href="Edu-Qualification-management.php" class="nav-link">EDU.Qualification</a>
                </li>
                <li class="nav-item">
                  <a href="Employment-history-management.php" class="nav-link">Employment History</a>
                </li>
                <li class="nav-item">
                  <a href="Document-management.php" class="nav-link">Document</a>
                </li>
              </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Attendence</li>
        <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#Attendence" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="layers"></i>
                <span class="link-title">Attendence</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="Attendence">
                <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="Add-Attendence.php" class="nav-link">Add Attendence</a>
                  </li>
                  <li class="nav-item">
                    <a href="View-Emp-Attendence.php" class="nav-link">View Attendence</a>
                  </li>

                  <li class="nav-item">
                    <a href="Location-List.php" class="nav-link">Fingerprint Location</a>
                  </li>

                </ul>
              </div>
          </li>

        <li class="nav-item nav-category">Organization</li>

        <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#Company" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="layers"></i>
                <span class="link-title">Organization</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse" id="Company">
                <ul class="nav sub-menu">
                  <li class="nav-item">
                    <a href="Company-List.php" class="nav-link">Company</a>
                  </li>
                  <li class="nav-item">
                    <a href="Department-List.php" class="nav-link">Department</a>
                  </li>
                  <li class="nav-item">
                    <a href="Location-List.php" class="nav-link">Location</a>
                  </li>
                </ul>
              </div>
          </li>



        <?php
         if ($U_level== '0') {
           echo '<li class="nav-item nav-category">System</li>
           <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="collapse" href="#System" role="button" aria-expanded="false" aria-controls="emails">
                   <i class="link-icon" data-feather="user-plus"></i>
                   <span class="link-title">Users</span>
                   <i class="link-arrow" data-feather="chevron-down"></i>
                 </a>
                 <div class="collapse" id="System">
                   <ul class="nav sub-menu">
                     <li class="nav-item">
                       <a href="System-User-List.php" class="nav-link">System Users</a>
                     </li>
                     <li class="nav-item">
                       <a href="Employee-to-User.php" class="nav-link">Convert Employee to User</a>
                     </li>

                   </ul>
                 </div>
             </li>';
         } else {
           // code...
         }
        ?>



    </ul>
  </div>
</nav>
