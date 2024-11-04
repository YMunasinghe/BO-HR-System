<?php
include('include/dbConnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['company_name'])) {
        $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);

        $query = "SELECT * FROM department WHERE company = (SELECT C_id FROM company WHERE C_id = '$company_name')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            $projects = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $projects[] = $row;
            }

            mysqli_close($conn);

            echo json_encode($projects);
        } else {
            echo json_encode(array('error' => 'Database query error: ' . mysqli_error($conn)));
        }
    } else {
        echo json_encode(array('error' => 'Invalid POST parameter'));
    }
} else {
    echo json_encode(array('error' => 'Unsupported request method'));
}
?>
