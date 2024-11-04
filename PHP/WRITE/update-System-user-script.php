<?php
if(isset($_POST['reset_pw'])){
  $U_id = $_POST ['U_id'];
  $pw=$_POST['pw'];
  $E_password=$_POST['E_password'];

  if ($pw != $E_password) {
    echo "<script>alert('Password is not match!')</script>";
  }

  else {
    $hashed_password = password_hash($E_password, PASSWORD_DEFAULT);
    $update_password="UPDATE user  SET E_password='$hashed_password' WHERE U_id='$U_id'";

    $run_update = mysqli_query($conn,$update_password);

    if($run_update)
     {

       echo "<script>window.open('System-User-List.php','_self')</script>";

     } else {

       echo "<script>
       Swal.fire('Oops...',
      'Something went wrong!.Please try again!',
      'error')
        </script>";
     }

  }


}


//////////////////////////

if(isset($_POST['s_user_update'])){
  $U_id = $_POST ['U_id'];
  $EU_email=$_POST['EU_email'];
  $U_level=$_POST['U_level'];
  $U_Status=$_POST['U_Status'];




  if ($EU_email == '') {
    echo "<script>alert('Fill the all fild')</script>";
  }

  else {
    $update_suser="UPDATE user  SET EU_email='$EU_email', U_level='$U_level',  U_Status='$U_Status' WHERE U_id='$U_id'";

    $run_update = mysqli_query($conn,$update_suser);

    if($run_update)
     {

       echo "<script>window.open('System-User-List.php','_self')</script>";

     } else {

       echo "<script>
       Swal.fire('Oops...',
      'Something went wrong!.Please try again!',
      'error')
        </script>";
     }

  }


}

 ?>
