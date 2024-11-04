<?php
if(isset($_POST['add_empDoc'])){
  $E_id = $_POST['E_id'];
  $documents = array();

  $documentNameArray = $_POST['EMP_Document'];
  $documentFileArray = $_FILES['EMP_DocumentFile']['name'];
  $documentFileTmpArray = $_FILES['EMP_DocumentFile']['tmp_name'];

  for($i = 0; $i < count($documentNameArray); $i++) {
    $documentName = $documentNameArray[$i];
    $documentFile = $documentFileArray[$i];
    $documentFileTmp = $documentFileTmpArray[$i];

    if(!empty($documentName) && !empty($documentFile)) {
      $documents[] = [
        'documentName' => $documentName,
        'documentFile' => $documentFile,
        'documentFileTmp' => $documentFileTmp
      ];
    }
  }

  if($E_id == '' || empty($documents)){
    echo "<script>alert('Please fill in all the fields')</script>";
    exit();
  } else {
    $insertedRows = 0;
    foreach($documents as $document) {
      $documentName = $document['documentName'];
      $documentFile = $document['documentFile'];
      $documentFileTmp = $document['documentFileTmp'];

      $documentPath = 'assets/images/Employees_Doc/'.$documentFile;

      if(move_uploaded_file($documentFileTmp, $documentPath)) {
        $insertQuery = "INSERT INTO emp_documents (E_id, DocumentName, DocumentPath)
                        VALUES ('$E_id', '$documentName', '$documentPath')";

        $runInsertQuery = mysqli_query($conn, $insertQuery);
        if($runInsertQuery) {
          $insertedRows++;
        }
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
