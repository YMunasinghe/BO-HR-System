<?php
$companyId = $_GET['company'];

$query = "SELECT D_id, Department_Name FROM department WHERE C_id = $companyId";
$result = mysqli_query($conn, $query);

$departments = array();
while ($row = mysqli_fetch_assoc($result)) {
    $departments[] = $row;
}

echo json_encode($departments);
?>
