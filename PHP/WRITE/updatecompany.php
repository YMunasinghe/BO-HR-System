<?php
if(isset($_POST['update_company'])){

   // $= $u_id;

  $C_id=$_POST['C_id'];
  $C_name=$_POST['C_name'];
  $C_EPFNo=$_POST['C_EPFNo'];



  if($C_id=='' ){

		echo "<script>alert('Please fill in all the fileds')</script>";
		exit();
		}
    else {
      $update_company="UPDATE company  SET C_name='$C_name', C_EPFNo='$C_EPFNo' WHERE C_id='$C_id'";

      $run_update = mysqli_query($conn,$update_company);

     if($run_update)
     {

       echo "<script>window.open('Company-List.php','_self')</script>";
    
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
