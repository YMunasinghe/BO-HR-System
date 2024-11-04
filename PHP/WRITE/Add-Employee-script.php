<?php
if(isset($_POST['regemp'])){

  $E_Fname = $_POST['E_Fname'];
  $E_Mname = $_POST['E_Mname'];
  $E_Lname = $_POST['E_Lname'];
  $E_Sname = $_POST['E_Sname'];
  $E_Bday  = $_POST['E_Bday'];
  $E_NIC   = $_POST['E_NIC'];
  $E_Religion = $_POST['E_Religion'];
  $E_PAddress = $_POST['E_PAddress'];
  $E_TAddress = $_POST['E_TAddress'];
  $E_Mobile = $_POST['E_Mobile'];
  $E_Landno = $_POST['E_Landno'];
  $E_PEmail = $_POST['E_PEmail'];
  $E_MaritalStatus = $_POST['E_MaritalStatus'];
  $E_Gender = $_POST['E_Gender'];
  $E_law = $_POST['E_law'];
  $E_lawDT = $_POST['E_lawDT'];
  $E_health = $_POST['E_health'];
  $E_healthDT = $_POST['E_healthDT'];

  $E_emergency_Name = $_POST['E_emergency_Name'];
  $E_emergency_Reletionship = $_POST ['E_emergency_Reletionship'];
  $E_emergency_CNumber = $_POST ['E_emergency_CNumber'];

  $E_Company = $_POST['E_Company'];
  $E_Number = $_POST['E_Number'];
  $E_Jdate = $_POST['E_Jdate'];
  $E_Status = $_POST['E_Status'];

  $E_Cmobile = $_POST['E_Cmobiles'];
  $E_email = $_POST['E_email'];
  $E_Position = $_POST['E_Position'];
  $Emp_FP_Id = $_POST['E_Finger_Id'];

  $E_Department = $_POST['E_Department'];
  $E_Image = $_FILES['E_Image']['name'];

  $E_Status = $E_Status;
  $E_Image = $E_Image;

  $whereConditionQuery = array();
  $whereConditionData = array();

  if ($E_Mname !== "") {
      $whereConditionQuery[] = "E_Mname";
      $whereConditionData[] = "'$E_Mname'";
  }
  if ($E_Lname !== "") {
    $whereConditionQuery[] = "E_Lname";
    $whereConditionData[] = "'$E_Lname'";
  }
  if ($E_Sname !== "") {
      $whereConditionQuery[] = "E_Sname";
      $whereConditionData[] = "'$E_Sname'";
  }
  if ($E_Bday !== "") {
      $whereConditionQuery[] = "E_Bday";
      $whereConditionData[] = "'$E_Bday'";
  }
  if ($E_NIC !== "") {
      $whereConditionQuery[] = "E_NIC";
      $whereConditionData[] = "'$E_NIC'";
  }
  if ($E_Religion !== "") {
      $whereConditionQuery[] = "E_Religion";
      $whereConditionData[] = "'$E_Religion'";
  }
  if ($E_PAddress !== "") {
      $whereConditionQuery[] = "E_PAddress";
      $whereConditionData[] = "'$E_PAddress'";
  }
  if ($E_TAddress !== "") {
      $whereConditionQuery[] = "E_TAddress";
      $whereConditionData[] = "'$E_TAddress'";
  }
  if ($E_Mobile !== "") {
      $whereConditionQuery[] = "E_Mobile";
      $whereConditionData[] = "'$E_Mobile'";
  }
  if ($E_Landno !== "") {
      $whereConditionQuery[] = "E_Landno";
      $whereConditionData[] = "'$E_Landno'";
  }
  if ($E_PEmail !== "") {
      $whereConditionQuery[] = "E_PEmail";
      $whereConditionData[] = "'$E_PEmail'";
  }
  if ($E_MaritalStatus !== "") {
      $whereConditionQuery[] = "E_MaritalStatus";
      $whereConditionData[] = "'$E_MaritalStatus'";
  }
  if ($E_Gender !== "") {
      $whereConditionQuery[] = "E_Gender";
      $whereConditionData[] = "'$E_Gender'";
  }
  if ($E_law !== "") {
      $whereConditionQuery[] = "E_law";
      $whereConditionData[] = "'$E_law'";
  }
  if ($E_lawDT !== "") {
      $whereConditionQuery[] = "E_lawDT";
      $whereConditionData[] = "'$E_lawDT'";
  }
  if ($E_health !== "") {
      $whereConditionQuery[] = "E_health";
      $whereConditionData[] = "'$E_health'";
  }
  if ($E_healthDT !== "") {
      $whereConditionQuery[] = "E_healthDT";
      $whereConditionData[] = "'$E_healthDT'";
  }
  if ($E_emergency_Name !== "") {
      $whereConditionQuery[] = "E_emergency_Name";
      $whereConditionData[] = "'$E_emergency_Name'";
  }
  if ($E_emergency_Reletionship !== "") {
      $whereConditionQuery[] = "E_emergency_Reletionship";
      $whereConditionData[] = "'$E_emergency_Reletionship'";
  }
  if ($E_emergency_CNumber !== "") {
      $whereConditionQuery[] = "E_emergency_CNumber";
      $whereConditionData[] = "'$E_emergency_CNumber'";
  }
  if ($E_Number !== "") {
      $whereConditionQuery[] = "E_Number";
      $whereConditionData[] = "'$E_Number'";
  }
  if ($E_Jdate !== "") {
      $whereConditionQuery[] = "E_Jdate";
      $whereConditionData[] = "'$E_Jdate'";
  }
  if ($E_Status !== "") {
      $whereConditionQuery[] = "E_Status";
      $whereConditionData[] = "'$E_Status'";
  }
  if ($E_Cmobile !== "") {
      $whereConditionQuery[] = "E_Cmobile";
      $whereConditionData[] = "'$E_Cmobile'";
  }
  if ($E_email !== "") {
      $whereConditionQuery[] = "E_email";
      $whereConditionData[] = "'$E_email'";
  }

  $whereClauseQuery = (count($whereConditionQuery) > 0) ? ", " . implode(" , ", $whereConditionQuery) : "";
  $whereClauseData = (count($whereConditionData) > 0) ? ", " . implode(" , ", $whereConditionData) : "";

  $fileExtension = strtolower(pathinfo($_FILES['E_Image']['name'], PATHINFO_EXTENSION));

  if ($E_Image=='') {
      $E_Image='emt.jpg';
  } else {
    $target_one = "assets/images/employees_images/" . basename($E_Image);
  }

  $InsetEMP = "INSERT INTO `b_employees` (`E_Fname`, `E_Company`, `E_Department`, `E_Position`, `E_Image`, `E_Active_no`, `FP_Id`$whereClauseQuery) VALUES
    ('$E_Fname', '$E_Company', '$E_Department', '$E_Position', '$E_Image', '0', '$Emp_FP_Id'$whereClauseData)";

    // $InsetEMP = "INSERT INTO `b_employees` (`E_Fname`, `E_Mname`, `E_Lname`, `E_Sname`, `E_Bday`, `E_NIC`, `E_Religion`, `E_PAddress`, `E_TAddress`, `E_Mobile`, `E_Landno`, `E_PEmail`, `E_MaritalStatus`, `E_Gender`, `E_law`, `E_lawDT`, `E_health`, `E_healthDT`, `E_email`, `E_emergency_Name`, `E_emergency_Reletionship`, `E_emergency_CNumber`, `E_Company`, `E_Number`, `E_Jdate`, `E_Status`, `E_Cmobile`, `E_Department`, `E_Position`, `E_Image`, `E_Active_no`, `FP_Id`) VALUES
    // ('$E_Fname', '$E_Mname', '$E_Lname', '$E_Sname', '$E_Bday', '$E_NIC', '$E_Religion', '$E_PAddress', '$E_TAddress', '$E_Mobile', '$E_Landno', '$E_PEmail', '$E_MaritalStatus', '$E_Gender', '$E_law', '$E_lawDT', '$E_health', '$E_healthDT', '$E_email', '$E_emergency_Name', '$E_emergency_Reletionship', '$E_emergency_CNumber', '$E_Company', '$E_Number', '$E_Jdate', '$E_Status', '$E_Cmobile', '$E_Department', '$E_Position', '$E_Image', '0', '$Emp_FP_Id')";

    if (move_uploaded_file($_FILES['E_Image']['tmp_name'], $target_one)) {
    $msg = "Image uploaded successfully";
    //echo "<script>window.alert('$msg')</script>";
  }else{
  		$msg = "Failed to upload image";
      //echo "<script>window.alert('$msg')</script>";
  	}

    $run_InsetEMP = mysqli_query($conn,$InsetEMP);

    if($run_InsetEMP) {
      echo "<script>window.open('Employees-List.php','_self')</script>";
     //  echo "<script>
     //  Swal.fire('Good job!',
     // 'Your mail has been sent!.We will contact you soon!',
     // 'success')
     //   </script>";
    } else {
      echo "Error: " . mysqli_error($conn);
    }


    // }

}


//// bulk upload

if (isset($_POST['empbulk'])) {

    // CSV File Upload
    $handle = fopen($_FILES['empcsv']['tmp_name'], "r");
    $headers = fgetcsv($handle, 1000, ",");

    $E_Image='emt.jpg';

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $E_Fname = $data[0];
        $E_Lname = $data[1];
        $E_NIC = $data[2];
        $E_Mobile = $data[3];

        // Check if a unit with the same name exists in the same project
        $check_emp_query = "SELECT * FROM  b_employees WHERE E_NIC = '$E_NIC'";
        $check_emp_result = mysqli_query($conn, $check_emp_query);

        if (mysqli_num_rows($check_emp_result) > 0) {


            // You can also display a message or log that the unit already exists.

          echo '<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
									<div class="d-flex align-items-center">
										<div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">Unit Name</h6>
											<div class="text-white">Employees with NIC '. $E_NIC .' already exists in this System.</div>
										</div>
									</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div><br>';
        } else {
            // Insert the new unit
            $insert_new_emp = "INSERT INTO  b_employees  (E_Fname, E_Mname, E_Lname, E_Sname, E_Bday, E_NIC, E_Religion, E_PAddress, E_TAddress, E_Mobile, E_Landno, E_PEmail,E_MaritalStatus, E_Gender, E_law, E_lawDT, E_health, E_healthDT, E_email, E_emergency_Name, E_emergency_Reletionship, E_emergency_CNumber, E_Company, E_Number, E_Jdate, E_Status, E_Cmobile, E_Department, E_Position, E_Image, E_Active_no, FP_Id)
            VALUES ('$E_Fname', '', '$E_Lname', '', '', '$E_NIC', '', '', '', '$E_Mobile', '0',
              '0','','', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '$E_Image', '0', '0')";

            $run_posts = mysqli_query($conn, $insert_new_emp);

            if (!$run_posts) {
                //Error in inserting data
                echo "Error: " . mysqli_error($conn);
                exit; // Stop further execution
            }

            echo "<script>window.open('Employees-List.php','_self')</script>";
        }
    }
    fclose($handle);
}

if (isset($_POST['empbulkFormat2'])) {

  // CSV File Upload
  $handle = fopen($_FILES['empcsv']['tmp_name'], "r");
  $headers = fgetcsv($handle, 1000, ",");

  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $surname = !empty($data[0]) ? $data[0] : "";
      $E_Fname = !empty($data[1]) ? $data[1] : "";
      $E_Mname = !empty($data[2]) ? $data[2] : "";
      $last_name = !empty($data[3]) ? $data[3] : "";
      $good_name = !empty($data[4]) ? $data[4] : "";
      $E_NIC = !empty($data[5]) ? $data[5] : "";
      $dep_id = !empty($data[6]) ? $data[6] : "";
      $offz_num = !empty($data[7]) ? $data[7] : "";

      $company_id = !empty($data[8]) ? $data[8] : "";

      $joining_date = !empty($data[9]) ? DateTime::createFromFormat('m/d/Y', $data[9]) : null;
      $birth_days = !empty($data[10]) ? DateTime::createFromFormat('m/d/Y', $data[10]) : null;
      $location = !empty($data[11]) ? $data[11] : "";

      // Build dynamic column and value clauses
      $whereConditions = array();
      $whereValues = array();

      if ($surname !== null) {
        $whereConditions[] = "E_Sname";
        $whereValues[] = "'" . $surname . "'";
      }
      if ($E_Fname !== null) {
        $whereConditions[] = "E_Fname";
        $whereValues[] = "'" . $E_Fname . "'";
      }
      if ($E_Mname !== null) {
        $whereConditions[] = "E_Mname";
        $whereValues[] = "'" . $E_Mname . "'";
      }
      if ($last_name !== null) {
        $whereConditions[] = "E_Lname";
        $whereValues[] = "'" . $last_name . "'";
      }
      if ($good_name !== null) {
        $whereConditions[] = "good_name";
        $whereValues[] = "'" . $good_name . "'";
      }
      if ($E_NIC !== null) {
        $whereConditions[] = "E_NIC";
        $whereValues[] = "'" . $E_NIC . "'";
      }
      if ($dep_id !== null) {
        $whereConditions[] = "E_Department";
        $whereValues[] = "'" . $dep_id . "'";
      }
      if ($offz_num !== null) {
        $whereConditions[] = "E_Cmobile";
        $whereValues[] = "'" . $offz_num . "'";
      }
      if ($company_id !== null) {
        $whereConditions[] = "E_Company";
        $whereValues[] = "'" . $company_id . "'";
      }
      if ($joining_date !== null) {
          $whereConditions[] = "E_Jdate";
          $whereValues[] = "'" . $joining_date->format('Y-m-d') . "'";
      }
      if ($birth_days !== null) {
          $whereConditions[] = "E_Bday";
          $whereValues[] = "'" . $birth_days->format('Y-m-d') . "'";
      }
      if ($location !== null) {
        $whereConditions[] = "emp_location_id";
        $whereValues[] = "'" . $location . "'";
      }

      $columnWhereClause = count($whereConditions) > 0 ? " " . implode(", ", $whereConditions) : "";
      $whereClause = count($whereValues) > 0 ? " " . implode(", ", $whereValues) : "";

      $insert_new_emp = "INSERT INTO b_employees
        ($columnWhereClause)
        VALUES
        ($whereClause)";

      // Run the query
      $run_posts = mysqli_query($conn, $insert_new_emp);

      // Error handling
      if (!$run_posts) {
          echo "Error: " . mysqli_error($conn);
          exit;
      }
  }
  echo "<script>window.open('Employees-List.php','_self')</script>";
  fclose($handle);
}

 ?>
