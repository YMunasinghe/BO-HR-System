<?php
echo "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
if(isset($_POST['update_attendence'])){

    $attendence_id = $_POST['att_id'];
    // $Emp_Id = $_POST['emp_id'];
    $FP_id=$_POST['selectedEmployee'];
    $attendence_Date=$_POST['attendenceDate'];
    $selectedCheckInLocation=$_POST['selectedCheckInLocation'];
    $selectedCheckOutLocation=$_POST['selectedCheckOutLocation'];
    $startTime=$_POST['startTime'];
    $endTime=$_POST['endTime'];

    $getEmpId = mysqli_query($conn, "SELECT E_id FROM b_employees WHERE FP_Id = '$FP_id'");
    $getEmpIdResult = mysqli_fetch_assoc($getEmpId);
    $getEmpIdResult = $getEmpIdResult['E_id'];

    $checkAttendenceAvailability = "SELECT * FROM emp_attendence WHERE FP_Id='$FP_id' AND FP_Date='$attendence_Date' AND attendence_id<>'$attendence_id'";
    $checkAttendenceAvailability = mysqli_query($conn, $checkAttendenceAvailability);
    $checkAttendenceAvailabilityResult = mysqli_fetch_assoc($checkAttendenceAvailability);

    if ($checkAttendenceAvailabilityResult == '') {
        $update_attendence="UPDATE emp_attendence SET FP_Id='$FP_id', FP_Date='$attendence_Date', FP_Start_Time='$startTime', FP_End_Time='$endTime', E_Id='$getEmpIdResult', checkIn_location='$selectedCheckInLocation', checkOut_location='$selectedCheckOutLocation'  WHERE attendence_id='$attendence_id'";
        $run_update = mysqli_query($conn,$update_attendence);
        if ($run_update) {
            echo "<script>Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Successfully Updated!',
              showConfirmButton: false,
              timer: 1500
            });</script>";
          }
          echo "<script>
          setTimeout(() => {
              window.location.href = 'View-Emp-Attendence.php';
          }, 1500);
          </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'This attendence date already exists for the employee!',
            });
        </script>";
    }

  }
?>