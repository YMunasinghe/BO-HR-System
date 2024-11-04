<?php
if(isset($_GET['view_department'])){
    $D_id = $_GET['view_department'];
    $select_customer = "SELECT * FROM department  WHERE D_id ='$D_id'";
    $run_query = mysqli_query($conn, $select_customer);

    if ($run_query) {
        // Check if any rows were returned
        if (mysqli_num_rows($run_query) > 0) {
            while ($row_post = mysqli_fetch_array($run_query)) {
                $D_id = $row_post['D_id'];
                $Department_Name = $row_post['Department_Name'];
                $company = $row_post['company'];
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
