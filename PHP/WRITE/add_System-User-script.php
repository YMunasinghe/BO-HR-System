<?php
if(isset($_POST['Add_NU'])){

  $EU_email = $_POST['EU_email'];
  $Epw = $_POST ['Epw'];
  $E_password = $_POST['E_password'];
  $U_level = $_POST['U_level'];
  $Created_by = $_POST['Created_by'];
  $Created_Date = $_POST['Created_Date'];


  if($Epw != $E_password ){
   echo "<script>alert('password is not match')</script>";
   exit();
 }

   else {
     $hashed_password = password_hash($E_password, PASSWORD_DEFAULT);

      $insert_new_sUser = "INSERT INTO user (EU_email, E_password, U_level, E_id, Created_by, Created_Date, U_Status )
      VALUES ('$EU_email', '$hashed_password', '$U_level', '0', '$Created_by', '$Created_Date', '0')";

     $run_posts = mysqli_query($conn,$insert_new_sUser);
     echo "<script>window.open('System-User-List.php','_self')</script>";
  }


}

/// emp cvt //

if(isset($_POST['C_Add_NU'])){

  $empid = $_POST['empid'];
  $Epw = $_POST ['Epw'];
  $E_password = $_POST['E_password'];
  $U_level = $_POST['U_level'];
  $Created_by = $_POST['Created_by'];
  $Created_Date = $_POST['Created_Date'];

  $select_emp = "SELECT * FROM  b_employees WHERE E_id ='$empid'";
  $run_query = mysqli_query($conn,$select_emp);
  while ($row_post = mysqli_fetch_array($run_query)){

    $E_email2 = $row_post ['E_email'];
    $E_id2 = $row_post ['E_id'];

  }


 // echo "<script>alert($E_id2)</script>";

  if($Epw != $E_password ){
   echo "<script>alert('password is not match')</script>";
   exit();
 }

   else {
     $hashed_password2 = password_hash($E_password, PASSWORD_DEFAULT);
      $insert_new_sUser = "INSERT INTO user (EU_email, E_password, U_level, E_id, Created_by, Created_Date, U_Status )
      VALUES ('$E_email2', '$hashed_password2', '$U_level', '$E_id2', '$Created_by',  '$Created_Date', '0')";

     $run_posts = mysqli_query($conn,$insert_new_sUser);
     echo "<script>window.open('System-User-List.php','_self')</script>";
  }


}

 ?>
