<?php
include('include/dbConnection.php');
    if (isset($_GET['viewattendence'])) {
        $employeeFPId = $_GET['EmployeeId'];
        $startDate = $_GET['StartDate'];
        $endDate = $_GET['EndDate'];
        $department = $_GET['Department'];
        $location = $_GET['Location'];

        $dataArray = array();
        // if ($startDate === null || $startDate === '') {
        //     $startDate = '00:00:00';
        // }
        // if ($endDate === null || $endDate === '') {
        //     $endDate = '00:00:00';
        // }

        if ($startDate == '') {
            $startDate = "Start Date";
        }
        if ($endDate == '') {
            $endDate = "End Date";
        }
            $whereConditions = array();

            if ($employeeFPId !== "Employee") {
                $whereConditions[] = "a.FP_Id = '$employeeFPId'";
            }

            if  ($startDate !== "Start Date" &&  $endDate !== "End Date") {
                $whereConditions[] = "a.FP_Date BETWEEN '$startDate' AND '$endDate'";
            } else {
                if ($startDate !== "Start Date") {
                    $whereConditions[] = "a.FP_Date = '$startDate'";
                }
                if ($endDate !== "End Date") {
                    $whereConditions[] = "a.FP_Date = '$endDate'";
                }
            }
            if ($location !== "Location") {
                $whereConditions[] = "a.checkIn_location = '$location' OR a.checkOut_location = '$location'";
            }
            if ($department !== "Department") {
                $whereConditions[] = "e.E_Department = '$department'";
            }

            $whereClause = (count($whereConditions) > 0) ? " WHERE ". implode(" AND ",$whereConditions) : "";

            $sql = "SELECT * FROM emp_attendence a
            JOIN b_employees e ON a.FP_Id = e.FP_Id
            INNER JOIN department d ON e.E_Department = d.D_id
            $whereClause";

            $filteredResults = mysqli_query($conn, $sql);

            if ($filteredResults) {
                for ($i=0; $i<mysqli_num_rows($filteredResults); $i++) {
                    $row=mysqli_fetch_assoc($filteredResults);

                    $startTime = strtotime($row['FP_Start_Time']);
                    $endTime = strtotime($row['FP_End_Time']);

                    if ($row['FP_Start_Time'] == '00:00:00' || $row['FP_End_Time'] == '00:00:00') { //1710716400 number is for time 00:00:00
                        $totalHours = 0;
                    } else {
                        $totalSeconds = $endTime - $startTime;
                        $totalHours = floor($totalSeconds/3600);
                    }

                    $checkIn_location = $row['checkIn_location'];
                    $getCheckInLocation = mysqli_query($conn, "SELECT location_name FROM location WHERE location_id = '$checkIn_location'");
                    $checkInLocationData = mysqli_fetch_assoc($getCheckInLocation);
                    if ($checkInLocationData == '') {
                            $CheckInLocation = "Unknown";
                        } else {
                        $CheckInLocation = $checkInLocationData['location_name'];
                    }

                    $checkOut_location = $row['checkOut_location'];
                    $getCheckOutLocation = mysqli_query($conn, "SELECT location_name FROM location WHERE location_id = '$checkOut_location'");
                    $checkOutLocationData = mysqli_fetch_assoc($getCheckOutLocation);
                    if ($checkOutLocationData == '') {
                        $CheckOutLocation = "Unknown";
                    } else {
                        $CheckOutLocation = $checkOutLocationData['location_name'];
                    }

                    // echo "<script>console.log('".$sss."');</script>";
                    $dataArray[$i] = array();
                    $dataArray[$i] = array(
                        'attendence_id' => $row['attendence_id'],
                        'E_Image' => $row['E_Image'],
                        'E_Fname' => $row['E_Fname'],
                        'E_Lname' => $row['E_Lname'],
                        'FP_Id' => $row['FP_Id'],
                        'EMP_No' => $row['E_Number'],
                        'E_Cmobile' => $row['E_Cmobile'],
                        'E_Department' => $row['Department_Name'],
                        'FP_Date' => $row['FP_Date'],
                        'checkIn_location' => $CheckInLocation,
                        'FP_Start_Time' => $row['FP_Start_Time'],
                        'checkOut_location' => $CheckOutLocation,
                        'FP_End_Time' => $row['FP_End_Time'],
                        'Total_Hours' => $totalHours

                    );
                }
            }
    } else {
        $dataArray = array();
        $sql = "SELECT * FROM emp_attendence a
        INNER JOIN b_employees e ON a.FP_Id = e.FP_Id
        INNER JOIN department d ON e.E_Department = d.D_id";
        $filteredResults = mysqli_query($conn, $sql);

        if ($filteredResults) {
            for ($i=0; $i<mysqli_num_rows($filteredResults); $i++) {
                $row=mysqli_fetch_assoc($filteredResults);

                $startTime = strtotime($row['FP_Start_Time']);
                $endTime = strtotime($row['FP_End_Time']);

                if ($row['FP_Start_Time'] == '00:00:00' || $row['FP_End_Time'] == '00:00:00') { //1710716400 number is for time 00:00:00
                    $totalHours = 0;
                } else {
                    $totalSeconds = $endTime - $startTime;
                    $totalHours = floor($totalSeconds/3600);
                }
                $checkIn_location = $row['checkIn_location'];
                $getCheckInLocation = mysqli_query($conn, "SELECT location_name FROM location WHERE location_id = '$checkIn_location'");
                $checkInLocationData = mysqli_fetch_assoc($getCheckInLocation);
                if ($checkInLocationData == '') {
                        $CheckInLocation = "Unknown";
                    } else {
                    $CheckInLocation = $checkInLocationData['location_name'];
                }

                $checkOut_location = $row['checkOut_location'];
                $getCheckOutLocation = mysqli_query($conn, "SELECT location_name FROM location WHERE location_id = '$checkOut_location'");
                $checkOutLocationData = mysqli_fetch_assoc($getCheckOutLocation);
                if ($checkOutLocationData == '') {
                    $CheckOutLocation = "Unknown";
                } else {
                    $CheckOutLocation = $checkOutLocationData['location_name'];
                }

                // echo "<script>console.log('".$sss."');</script>";
                $dataArray[$i] = array();
                $dataArray[$i] = array(
                    'attendence_id' => $row['attendence_id'],
                    'E_Image' => $row['E_Image'],
                    'E_Fname' => $row['E_Fname'],
                    'E_Lname' => $row['E_Lname'],
                    'FP_Id' => $row['FP_Id'],
                    'EMP_No' => $row['E_Number'],
                    'E_Cmobile' => $row['E_Cmobile'],
                    'E_Department' => $row['Department_Name'],
                    'FP_Date' => $row['FP_Date'],
                    'checkIn_location' => $CheckInLocation,
                    'FP_Start_Time' => $row['FP_Start_Time'],
                    'checkOut_location' => $CheckOutLocation,
                    'FP_End_Time' => $row['FP_End_Time'],
                    'Total_Hours' => $totalHours

                );
            }
        }
    }

?>