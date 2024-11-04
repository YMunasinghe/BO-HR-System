<?php


if(isset($_POST['add_FamilyM'])){
  $E_id = $_POST['E_id'];
  $familyMembers = array();

$nameArray = $_POST['FM_Name'];
 $relationshipArray = $_POST['FM_Relationship'];
 $ageArray = $_POST['FM_Age'];
 $occupationArray = $_POST['FM_Occupation'];

 for($i = 0; $i < count($nameArray); $i++) {
   $name = $nameArray[$i];
   $relationship = $relationshipArray[$i];
   $age = $ageArray[$i];
   $occupation = $occupationArray[$i];

   if(!empty($name)) {
     $familyMembers[] = [
       'name' => $name,
       'relationship' => $relationship,
       'age' => $age,
       'occupation' => $occupation
     ];
   }
 }

  if($E_id == '' || empty($familyMembers)){
    echo "<script>alert('Please fill in all the fields')</script>";
    exit();
  } else {
    $insertedRows = 0;
    foreach($familyMembers as $member) {
      $name = $member['name'];
      $relationship = $member['relationship'];
      $age = $member['age'];
      $occupation = $member['occupation'];

      $insertQuery = "INSERT INTO e_family_member (E_id, FM_Name, FM_Relationship, FM_Age, FM_Occupation)
                      VALUES ('$E_id', '$name', '$relationship', '$age', '$occupation')";

      $runInsertQuery = mysqli_query($conn, $insertQuery);
      if($runInsertQuery) {
        $insertedRows++;
      }
    }

    if($insertedRows > 0) {
      echo "<script>window.open('Employees-List.php','_self')</script>";
    } else {
      echo "<script>
              Swal.fire('Oops...',
              'Something went wrong!. Please try again!',
              'error')
            </script>";
    }
  }
}
 ?>
