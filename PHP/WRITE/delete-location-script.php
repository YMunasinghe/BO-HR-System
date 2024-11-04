<?php include '../../include/dbConnection.php'; ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the 'L_id' parameter is set
        if (isset($_POST["L_id"])) {
            $id = $_POST['L_id'];
            $query = mysqli_query($conn, "UPDATE location SET 	act_status = 0 WHERE location_id = '$id'");
        }
    }
?>
