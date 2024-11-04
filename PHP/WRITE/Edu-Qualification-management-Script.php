<?php
if(isset($_POST['add_eduq'])){
  $E_id = $_POST['E_id'];
  $qualifications = array();

  $qualificationArray = $_POST['EDU_Qualification'];
  $MajorArray = $_POST['EDU_Major'];
  $instituteArray = $_POST['EDU_Institute'];
  $yearArray = $_POST['EDU_Year'];
  $resultArray = $_POST['EDU_Result'];

  for($i = 0; $i < count($qualificationArray); $i++) {

    $qualification = $qualificationArray[$i];
    $Major = $MajorArray[$i];
    $institute = $instituteArray[$i];
    $year = $yearArray[$i];
    $result = $resultArray[$i];

    if(!empty($qualification)) {
      $qualifications[] = [

        'qualification' => $qualification,
        'Major' => $Major,
        'institute' => $institute,
        'year' => $year,
        'result' => $result
      ];
    }
  }

  if($E_id == '' || empty($qualifications)){
    echo "<script>alert('Please fill in all the fields')</script>";
    exit();
  } else {
    $insertedRows = 0;
    foreach($qualifications as $qualification) {

      $qualificationName = $qualification['qualification'];
      $Major = $qualification['Major'];
      $institute = $qualification['institute'];
      $year = $qualification['year'];
      $result = $qualification['result'];

      $insertQuery = "INSERT INTO edu_qualification (E_id, Qualification, Major, Institute, Year, Result)
                      VALUES ('$E_id', '$qualificationName', '$Major', '$institute', '$year', '$result')";

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
