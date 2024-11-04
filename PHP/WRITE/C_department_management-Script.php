<?php
if(isset($_POST['add_comd'])){
  $company = $_POST['company'];
  $departments = array();

  $departmentArray = $_POST['COM_Department'];

  for($i = 0; $i < count($departmentArray); $i++) {
    $department = $departmentArray[$i];

    if(!empty($department)) {
      $departments[] = [
        'department' => $department
      ];
    }
  }

  if($company == '' || empty($departments)){
    echo "<script>alert('Please fill in all the fields')</script>";
    exit();
  } else {
    $insertedRows = 0;
    foreach($departments as $department) {
      $departmentName = $department['department'];

      $insertQuery = "INSERT INTO department (company, Department_Name)
                      VALUES ('$company', '$departmentName')";

      $runInsertQuery = mysqli_query($conn, $insertQuery);
      if($runInsertQuery) {
        $insertedRows++;
      }
    }

    if($insertedRows > 0) {
      echo "<script>window.open('Department-List.php','_self')</script>";
    } else {
      echo "<script>
              Swal.fire('Oops...',
              'Something went wrong!. Please try again!',
              'error')
            </script>";
    }
  }
}
?>
