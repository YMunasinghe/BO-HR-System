<?php
if(isset($_POST['updateempl'])){

  $E_id = isset($_POST['E_id']) ? $_POST['E_id'] : '';
//  $E_id = $_POST['E_id'];

  // echo "<script>console.log('$E_id')</script>";
  $E_Fname = $_POST['E_Fname'];
  $E_Mname = $_POST['E_Mname'];
  $E_Lname = $_POST['E_Lname'];
  $E_Sname = $_POST['E_Sname'];
  $E_Bday = $_POST['E_Bday'];
  $E_NIC = $_POST['E_NIC'];
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
  $E_email = $_POST['E_email'];
  $E_emergency_Name = $_POST['E_emergency_Name'];
  $E_emergency_Reletionship = $_POST['E_emergency_Reletionship'];
  $E_emergency_CNumber = $_POST['E_emergency_CNumber'];
  $E_Company = $_POST['E_Company'];
  $E_Number = $_POST['E_Number'];
  $E_Jdate = $_POST['E_Jdate'];
  $E_Status = $_POST['E_Status'];
  $E_Cmobile = $_POST['E_Cmobile'];
  $E_Department = $_POST['E_Department'];
  $E_Position = $_POST['E_Position'];
  $Emp_FP_Id = $_POST['E_Finger_Id'];
  $E_Image = $_FILES['E_Image']['name'];

if ($E_Image=='') {
  $sql = "SELECT * FROM b_employees WHERE E_id = '$E_id'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
  } else {
    echo "<script>alert('error')</script>";
  }
  $E_Image = $row['E_Image'];
}
//  $E_Active_no  = $row_post['E_Active_no'];
//   echo "<script>alert('$E_id')</script>";

   if($E_id=='') {
      echo "<script>alert('Authentication Error')</script>";
   } else {
     // $allowedExtensions = array('jpeg', 'jpg', 'png');
     $fileExtension = strtolower(pathinfo($_FILES['E_Image']['name'], PATHINFO_EXTENSION));
     // if (!in_array($fileExtension, $allowedExtensions)) {
     //   echo "<script>window.alert('Invalid file type. Only JPEG and PNG files are allowed.')</script>";
     //   echo "<script>window.open('Employees-List.php','_self')</script>";
     //   exit();
     // } else {
       $target_one = "assets/images/employees_images/" . basename($E_Image);
       $update_company="UPDATE b_employees SET E_Fname = '$E_Fname',
        E_Mname = '$E_Mname',
        E_Lname = '$E_Lname',
        E_Sname = '$E_Sname',
        E_Bday = '$E_Bday',
        E_NIC = '$E_NIC',
        E_Religion = '$E_Religion',
        E_PAddress = '$E_PAddress',
        E_TAddress = '$E_TAddress',
        E_Mobile = '$E_Mobile',
        E_Landno = '$E_Landno',
        E_PEmail = '$E_PEmail',
        E_MaritalStatus = '$E_MaritalStatus',
        E_Gender = '$E_Gender',
        E_law = '$E_law',
        E_lawDT = '$E_lawDT',
        E_health = '$E_health',
        E_healthDT = '$E_healthDT',
        E_email = '$E_email',
        E_emergency_Name = '$E_emergency_Name',
        E_emergency_Reletionship = '$E_emergency_Reletionship',
        E_emergency_CNumber = '$E_emergency_CNumber',
        E_Company = '$E_Company',
        E_Number = '$E_Number',
        E_Jdate = '$E_Jdate',
        E_Status = '$E_Status',
        E_Cmobile = '$E_Cmobile',
        E_Department = '$E_Department',
        E_Position = '$E_Position',
        FP_Id = '$Emp_FP_Id',
        E_Image = '$E_Image'
        WHERE E_id = '$E_id'";
        // E_Active_no = '$E_Active_no'


      $run_update = mysqli_query($conn,$update_company);
      if (move_uploaded_file($_FILES['E_Image']['tmp_name'],$target_one)) {
        $msg = "Image uploaded successfully";
        // echo "<script>window.alert('$msg')</script>";
      } else {
        $msg = "Failed to upload image";
        // echo "<script>window.alert('$msg')</script>";
      }

     if($run_update) {
         echo "<script>alert('Employee updated successfully')</script>";
         echo "<script>window.open('Employees-List.php','_self')</script>";

     } else {

         echo "<script>
       Swal.fire('Oops...',
      'Something went wrong!.Please try again!',
      'error')
        </script>";
         echo "<script>alert('not worknig')</script>";
     }
// }
    exit();
     }

  // echo "<script>alert('not go in to the isset')</script>";

}
?>
