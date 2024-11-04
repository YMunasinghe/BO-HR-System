<?php
if(isset($_POST['add_emph'])){
  $E_id = $_POST['E_id'];
  $employments = array();

  $positionArray = $_POST['EDU_Position'];
  $jobStartedArray = $_POST['EMPH_JStated'];
  $jobEndArray = $_POST['EMPH_Jend'];
  $reasonLeavingArray = $_POST['EMPH_Leaving'];
  $companyArray = $_POST['EMPH_Company'];

  for($i = 0; $i < count($positionArray); $i++) {
    $position = $positionArray[$i];
    $jobStarted = $jobStartedArray[$i];
    $jobEnd = $jobEndArray[$i];
    $reasonLeaving = $reasonLeavingArray[$i];
    $company = $companyArray[$i];

    if(!empty($position)) {
      $employments[] = [
        'position' => $position,
        'jobStarted' => $jobStarted,
        'jobEnd' => $jobEnd,
        'reasonLeaving' => $reasonLeaving,
        'company' => $company
      ];
    }
  }

  if($E_id == '' || empty($employments)){
    echo "<script>alert('Please fill in all the fields')</script>";
    exit();
  } else {
    $insertedRows = 0;
    foreach($employments as $employment) {
      $position = $employment['position'];
      $jobStarted = $employment['jobStarted'];
      $jobEnd = $employment['jobEnd'];
      $reasonLeaving = $employment['reasonLeaving'];
      $company = $employment['company'];

      $insertQuery = "INSERT INTO employmentshis (E_id, Position, JobStarted, JobEnd, ReasonLeaving, Company)
                      VALUES ('$E_id', '$position', '$jobStarted', '$jobEnd', '$reasonLeaving', '$company')";

      $runInsertQuery = mysqli_query($conn, $insertQuery);
      if($runInsertQuery) {
        $insertedRows++;
      }
    }

    if($insertedRows > 0) {
      echo "<script>window.open('Employees-List.php','_self')</script>";
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
