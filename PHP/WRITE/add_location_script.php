<?php
echo "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
if(isset($_POST['add_location'])){

  $L_name = $_POST['L_name'];

      $insert_new_location = "INSERT INTO location (location_name, act_status)
      VALUES ('$L_name', 1)";

     $run_posts = mysqli_query($conn,$insert_new_location);
     if ($run_posts) {
      echo "<script>Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Successfully Inserted!',
        showConfirmButton: false,
        timer: 1500
      });</script>";
    }
    echo "<script>
    setTimeout(() => {
        window.location.href = 'Location-List.php';
    }, 1500);
    </script>";
}

if(isset($_POST['update_location'])){

  $L_id=$_POST['L_id'];
  $L_name=$_POST['L_name'];

  if($L_id=='') {
		echo "<script>alert('Please fill in all the fileds')</script>";
		exit();
		}
    else {
      $update_company="UPDATE location SET location_name='$L_name' WHERE location_id='$L_id'";
      $run_update = mysqli_query($conn,$update_company);

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
        window.location.href = 'Location-List.php';
    }, 1500);
    </script>";
    }
}


?>

