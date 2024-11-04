<?php
echo "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
  if (isset($_POST['attendencesheet'])) {
    $selectedLocation = $_POST['selectedLocation'];
    $handle = fopen($_FILES['attendencecsv']['tmp_name'],"r");
    $headers = fgetcsv($handle,1000,",");

    // echo "<script>alert('".$selectedLocation."');</script>";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $FP_ID = $data[0];
      $FP_DATETIME = $data[1];
      $DATE_TIME = date_create_from_format('n/j/Y H:i',$FP_DATETIME);

      $FP_DATE = $DATE_TIME->format('Y-m-d');
      $FP_TIME = $DATE_TIME->format('H:i:s');
      $HOUR = $DATE_TIME->format('H');

      // echo '<script>console.log("'.$HOUR.'");</script>';

      $getReleventEmployee = "SELECT * FROM b_employees WHERE FP_ID='$FP_ID'";
      $getReleventEmployeeResult = mysqli_query($conn, $getReleventEmployee);
      $getReleventEmployeeResult = mysqli_fetch_assoc($getReleventEmployeeResult);

      $E_ID = 0;
      if ($getReleventEmployeeResult == '') {
        echo '<div class="alert alert-warning" role="alert">
                Finger print Id : "'.$FP_ID.'" has not assigned an employee!
              </div>';

      } else {
        $getReleventEmployeeResult = $getReleventEmployeeResult['E_id'];
        $E_ID = $getReleventEmployeeResult;
        $checkEmployeeAndAttendence = mysqli_query($conn, "SELECT * FROM emp_attendence WHERE FP_Date = '$FP_DATE' AND E_Id = '$E_ID'");
        $checkEmployeeAndAttendence = mysqli_fetch_assoc($checkEmployeeAndAttendence);

        if ($HOUR < 13) {
          if ($checkEmployeeAndAttendence == '') {
            $getReleventId = 'null';
            $sql  = "INSERT INTO emp_attendence (FP_Id, FP_Date, FP_Start_Time, FP_End_Time, E_Id, checkIn_location, checkOut_location) VALUES ('$FP_ID', '$FP_DATE', '$FP_TIME', 0, '$E_ID', '$selectedLocation', null)";
            $result = mysqli_query($conn, $sql);
          } else {
            $FP_Start_Time = $checkEmployeeAndAttendence['FP_Start_Time'];

            $getReleventId = $checkEmployeeAndAttendence['E_Id'];
            $getReleventDate = $checkEmployeeAndAttendence['FP_Date'];

            if (date("H:i:s", strtotime($FP_Start_Time)) > $FP_TIME) {
              $updateDate  = "UPDATE emp_attendence SET FP_Start_Time = '$FP_TIME', checkIn_location = '$selectedLocation'
              WHERE E_Id = '$getReleventId'
              AND FP_DATE = '$getReleventDate'";

              $updateOutDateResult = mysqli_query($conn, $updateDate);
            }
        }
        if ($result) {
          echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Successfully Inserted!',
            showConfirmButton: false,
            timer: 1500
          });</script>";

          echo "<script>
          setTimeout(() => {
              window.location.href = 'Add-Attendence.php';
          }, 15500);
          </script>";
        } else {
          echo "Error inserting unit with name '".$FP_ID."'<br>";
        }

      } else {
        if ($checkEmployeeAndAttendence == '') {
          $getReleventId = 'null';
          $sql  = "INSERT INTO emp_attendence (FP_Id, FP_Date, FP_Start_Time, FP_End_Time, E_Id, checkIn_location, checkOut_location) VALUES ('$FP_ID', '$FP_DATE', 0, '$FP_TIME', '$E_ID', null, '$selectedLocation')";
          $result = mysqli_query($conn, $sql);

        } else {
          $FP_End_Time = $checkEmployeeAndAttendence['FP_End_Time'];

          $getReleventId = $checkEmployeeAndAttendence['E_Id'];
          $getReleventDate = $checkEmployeeAndAttendence['FP_Date'];

          if (date("H:i:s", strtotime($FP_End_Time)) < $FP_TIME) {
            $updateDate  = "UPDATE emp_attendence SET FP_End_Time = '$FP_TIME', checkOut_location = '$selectedLocation'
            WHERE E_Id = '$getReleventId'
            AND FP_DATE = '$getReleventDate'";

            $updateOutDateResult = mysqli_query($conn, $updateDate);
          }
        }

        if ($result) {
          echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Successfully Inserted!',
            showConfirmButton: false,
            timer: 1500
          });</script>";

          echo "<script>
          setTimeout(() => {
              window.location.href = 'Add-Attendence.php';
          }, 1500);
          </script>";
        } else {
          echo "Error inserting unit with name '".$FP_ID."'<br>";
        }
      }
    }
  }
}



if (isset($_POST['attendencesheetFormat2'])) {
  $selectedLocation = $_POST['selectedLocation'];
  $handle = fopen($_FILES['attendencecsvFormat2']['tmp_name'],"r");

  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $FP_ID = $data[0];
    $FP_DATE = $data[1];
    $FP_InTime = $data[2];
    $FP_OutTime = $data[3];
    $FP_DATE = strtotime($FP_DATE);
    $FP_InTime = strtotime($FP_InTime);
    $FP_OutTime = strtotime($FP_OutTime);

    if ($FP_DATE) {
      $FP_DATE1 = date('Y-m-d', $FP_DATE);
    } else {
      $FP_DATE1 = null;
    }
    if ($FP_InTime) {
      $inTime = date('H:i:s', $FP_InTime);
    } else {
      $inTime = null;
    }
    if ($FP_OutTime) {
      $outTime = date('H:i:s', $FP_OutTime);
    } else {
      $outTime = null;
    }

    $getEIdQuery = mysqli_query($conn, "SELECT E_id FROM b_employees WHERE FP_Id = '$FP_ID' LIMIT 1");

    if ($getEIdQuery) {
      if ($inTime !== null OR $outTime !== null) {
        if (mysqli_num_rows($getEIdQuery)>0) {
          $getEIdResult = mysqli_fetch_assoc($getEIdQuery);
          $EId = $getEIdResult['E_id'];
            if ($inTime !== null && $outTime !== null) {
              $sql  = "INSERT INTO emp_attendence (FP_Id, FP_Date, FP_Start_Time, FP_End_Time, E_Id, checkIn_location, checkOut_location)
                      VALUES ('$FP_ID', '$FP_DATE1', '$inTime', '$outTime', '$EId', '$selectedLocation', '$selectedLocation')";
              
            } elseif ($inTime == null && $outTime !== null) {
                $sql  = "INSERT INTO emp_attendence (FP_Id, FP_Date, FP_End_Time, E_Id, checkOut_location)
                VALUES ('$FP_ID', '$FP_DATE1', '$outTime', '$EId',  '$selectedLocation')";
            } elseif ($inTime !== null && $outTime == null) {
                $sql  = "INSERT INTO emp_attendence (FP_Id, FP_Date, FP_Start_Time, E_Id, checkIn_location)
                        VALUES ('$FP_ID', '$FP_DATE1', '$inTime','$EId', '$selectedLocation')";

            }
            $updateOutDateResult = mysqli_query($conn, $sql);
            if (!$updateOutDateResult) {
                $error_message = mysqli_error($conn);
                echo '<div class="alert alert-danger" role="alert">
                        Error on Finger print id: '.$FP_ID.' on the date: '.$FP_DATE1.';
                      </div>';
            } else {
              echo '
              <div class="alert alert-success" role="alert">
                Record successfully inserted!
              </div>';
            }
        } else {
          echo '<div class="alert alert-danger" role="alert">
                  No Employee For Finger Print Id: '.$FP_ID.' on the date: '.$FP_DATE1.';
                </div>';
        }
      }
    }
  }
}
?>
