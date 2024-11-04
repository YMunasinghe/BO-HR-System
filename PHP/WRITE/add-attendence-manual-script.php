<?php include('../../include/dbConnection.php'); ?>
<?php
// if(isset($_POST['add_attendence_manu'])){
    $selectedLocation = $_POST['selectedLocation'];
    $attendenceDate = $_POST['attendenceDate'];

    $selectedEmployeeArray = $_POST['selectedEmployee'];
    $startTimeArray = $_POST['startTime'];
    $endTimeArray = $_POST['endTime'];

    $employeeAndTime = array();


    for ($i=0; $i<count($selectedEmployeeArray); $i++) {
        $selectedEmployee = $selectedEmployeeArray[$i];
        $startTime = $startTimeArray[$i];
        $endTime = $endTimeArray[$i];

        if (!empty($selectedEmployee)) {
            $employeeAndTime[] = [
                'selectedEmployee' => $selectedEmployee,
                'startTimeArray' => $startTime,
                'endTimeArray' => $endTime
            ];
        }
        // echo "End Time".$startTime."End Time".$endTime;
    }

    $insertRows = 0;
    foreach ($employeeAndTime as $employee) {
        $selectedEmployeeFP = $employee['selectedEmployee'];
        $startTime = $employee['startTimeArray'];
        $endTime = $employee['endTimeArray'];

        $getEId = "SELECT E_id, E_Fname, E_Lname FROM b_employees WHERE FP_Id = '$selectedEmployeeFP'";
        $getEIdResult = mysqli_query($conn, $getEId);
        $getEIdResult = mysqli_fetch_assoc($getEIdResult);
        $Emp_Id = $getEIdResult['E_id'];
        $Emp_FName = $getEIdResult['E_Fname'];
        $Emp_LName = $getEIdResult['E_Lname'];

        $getAttendenceAvailability = "SELECT * FROM emp_attendence WHERE FP_Id = '$selectedEmployeeFP'
                                    AND FP_Date = '$attendenceDate'";
        $getAttendenceAvailabilityResult = mysqli_query($conn, $getAttendenceAvailability);
        $getAttendenceAvailabilityResult = mysqli_fetch_assoc($getAttendenceAvailabilityResult);
        if ($getAttendenceAvailabilityResult == '') {
            $insertQuery = "INSERT INTO emp_attendence(FP_Id, FP_Date, FP_Start_Time, FP_End_Time, E_Id, checkIn_location, checkOut_location)
                            VALUES ('$selectedEmployeeFP', '$attendenceDate', '$startTime', '$endTime', '$Emp_Id', '$selectedLocation', '$selectedLocation')";

            $result = mysqli_query($conn, $insertQuery);
        } else {
            echo "(".$selectedEmployeeFP.")".$Emp_FName."/".$Emp_LName."-";
        }
        // (1)Yasiru/Munasinghe-(2)Ajith/Kamaljith-

    }

//   }
?>