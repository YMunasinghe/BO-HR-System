<?php
if(isset($_GET['view_user'])){
    $U_id = $_GET['view_user'];
    $select_customer = "SELECT * FROM user WHERE U_id ='$U_id'";
    $run_query = mysqli_query($conn, $select_customer);

    if ($run_query) {
        // Check if any rows were returned
        if (mysqli_num_rows($run_query) > 0) {
            while ($row_post = mysqli_fetch_array($run_query)) {
                $U_id = $row_post['U_id'];
                $EU_email = $row_post['EU_email'];
                $U_level = $row_post['U_level'];
                $E_id = $row_post['E_id'];
                $Created_by = $row_post['Created_by'];
                $Created_Date = $row_post['Created_Date'];
                $U_Status = $row_post['U_Status'];
            }
        } else {
            echo "No results found.";
        }
    } else {
        // Query execution error
        echo "Query error: " . mysqli_error($conn);
    }
}

?>
