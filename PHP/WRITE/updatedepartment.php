<?php
if(isset($_POST['update_department'])){

   // $= $u_id;

  $D_id=$_POST['D_id'];
  $Department_Name=$_POST['Department_Name'];
  $company=$_POST['company'];



  if($C_id=='' ){

		echo "<script>alert('Please fill in all the fileds')</script>";
		exit();
		}
    else {
      $update_company="UPDATE department  SET Department_Name='$Department_Name', company='$company' WHERE D_id='$D_id'";

      $run_update = mysqli_query($conn,$update_company);

     if($run_update)
     {

       echo "<script>window.open('Department-List.php','_self')</script>";

     } else {

       echo "<script>
       Swal.fire('Oops...',
      'Something went wrong!.Please try again!',
      'error')
        </script>";


     }


    }



}
//employment.php?view_user=<?php echo $u_id;?
?>
