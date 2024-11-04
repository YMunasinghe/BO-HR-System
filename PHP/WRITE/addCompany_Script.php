<?php
if(isset($_POST['add_Company'])){

  $C_name = $_POST['C_name'];
  $C_EPFNo = $_POST['C_EPFNo'];

  if($C_name=='null' ){
   echo "<script>alert('Please fill in all the fileds')</script>";
   exit();
   }

   else {
      $insert_new_company = "INSERT INTO company (C_name, C_EPFNo)
      VALUES ('$C_name', '$C_EPFNo')";

     $run_posts = mysqli_query($conn,$insert_new_company);
     echo "<script>window.open('Company-List.php','_self')</script>";
  }


}


 ?>
