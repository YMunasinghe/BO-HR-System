<?php
if(isset($_GET['view_company'])){
    $C_id = $_GET['view_company'];
    $select_customer = "SELECT * FROM company WHERE C_id ='$C_id'";
    $run_query = mysqli_query($conn, $select_customer);

    if ($run_query) {
        // Check if any rows were returned
        if (mysqli_num_rows($run_query) > 0) {
            while ($row_post = mysqli_fetch_array($run_query)) {
                $C_id = $row_post['C_id'];
                $C_name = $row_post['C_name'];
                $C_EPFNo = $row_post['C_EPFNo'];
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
