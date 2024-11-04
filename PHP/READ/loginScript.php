<?php
session_start();
include 'include/dbConnection.php';

// Function to extract user's operating system from the user agent (same as before)
function getOS($user_agent) {
    // ...
}

// Function to get user's ISP information using ipinfo.io API
function getUserIP() {
    // Check if the IP address is available from the proxy/CDN header
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // If the IP address is available in the custom header (e.g., X-Forwarded-For)
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $user_ip;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $EU_email = mysqli_real_escape_string($conn, $_POST['EU_email']);
    $E_password = mysqli_real_escape_string($conn, $_POST['E_password']);

    // Hash the password from the login form
    $hashed_password = password_hash($E_password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM user WHERE EU_email = '$EU_email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Verify the hashed password from the form with the one stored in the database
    if (password_verify($E_password, $row['E_password'])) {
        // Log the successful login attempt into the login_logs table
        $U_id = $row['U_id'];
        date_default_timezone_set('Asia/Colombo');
        $login_time = date('Y-m-d H:i:s');
        $login_ip = getUserIP(); // Get the IP address of the user
        $login_isp = 'Unknown ISP'; // Get the user's ISP
        $login_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user's browser
        $login_device = ""; // Initialize login_device variable
        $login_os = getOS($_SERVER['HTTP_USER_AGENT']); // Get the user's operating system

        // Determine the device type based on the user agent
        if (preg_match('/android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up.browser|up.link|webos|wos/i', $login_browser)) {
            $login_device = "Mobile";
        } elseif (preg_match('/ipad|ipod|iphone/i', $login_browser)) {
            $login_device = "Tablet";
        } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $login_browser)) {
            $login_device = "Mac";
        } elseif (preg_match('/windows|win32/i', $login_browser)) {
            $login_device = "PC";
        } else {
            $login_device = "Unknown";
        }

        $log_sql = "INSERT INTO login_logs (U_id, U_Email, login_time, login_ip, login_isp, login_browser, login_device, login_os)
                    VALUES ('$U_id', '$U_Email', '$login_time', '$login_ip', '$login_isp', '$login_browser', '$login_device', '$login_os')";
        mysqli_query($conn, $log_sql);

        $_SESSION['U_id'] = $U_id;
        $U_level = $row['U_level'];
        $U_Status = $row['U_Status'];


        if ($U_Status == '0') {
            header("location: dashboard.php");
        } else {
          $error = "Your account has been deactivated";
          echo $error;

        }
    } else {
        $error = "Your Email or Password is invalid";
        echo $error;

    }
}

// Close the database connection
//mysqli_close($conn);
?>
