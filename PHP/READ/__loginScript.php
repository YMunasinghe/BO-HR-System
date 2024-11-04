<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $EU_email = mysqli_real_escape_string($conn, $_POST['EU_email']);
    $E_password = mysqli_real_escape_string($conn, $_POST['E_password']);

    $sql = "SELECT * FROM user WHERE EU_email = '$EU_email' AND E_password = '$E_password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        $_SESSION['U_id'] = $row['U_id'];
        $U_Status = $row['U_Status']; // Assuming U_Status is a column in the user table

        if ($U_Status == '0') {
            header("location: dashboard.php");
        } else {
            $error = "Your Account has been Deactivated";
            echo $error;
        }
    } else {
        $error = "Your Email or Password is invalid";
        echo $error;
    }
}
?>
