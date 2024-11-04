<?php
if(isset($_GET['view_Employee'])){
    $E_id = mysqli_real_escape_string($conn, $_GET['view_Employee']);
    $select_customer = "SELECT * FROM b_employees INNER JOIN company ON b_employees.E_Company=company.C_id WHERE E_id ='$E_id'";
    $run_query = mysqli_query($conn, $select_customer);

    if ($run_query) {
        // Check if any rows were returned
        if (mysqli_num_rows($run_query) > 0) {
            while ($row_post = mysqli_fetch_array($run_query)) {
                $E_id = $row_post['E_id'];
                $E_Fname = $row_post['E_Fname'];
                $E_Mname = $row_post['E_Mname'];
                $E_Lname = $row_post['E_Lname'];
                $E_Sname = $row_post['E_Sname'];
                $E_Bday = $row_post['E_Bday'];
                $E_NIC = $row_post['E_NIC'];
                $E_Religion = $row_post['E_Religion'];
                $E_PAddress = $row_post['E_PAddress'];
                $E_TAddress = $row_post['E_TAddress'];
                $E_Mobile = $row_post['E_Mobile'];
                $E_Landno = $row_post['E_Landno'];
                $E_PEmail = $row_post['E_PEmail'];
                $E_MaritalStatus = $row_post['E_MaritalStatus'];
                $E_Gender = $row_post['E_Gender'];
                $E_law = $row_post['E_law'];
                $E_lawDT = $row_post['E_lawDT'];
                $E_health = $row_post['E_health'];
                $E_healthDT = $row_post['E_healthDT'];
                $E_email = $row_post['E_email'];
                $E_emergency_Name = $row_post ['E_emergency_Name'];
                $E_emergency_Reletionship = $row_post ['E_emergency_Reletionship'];
                $E_emergency_CNumber = $row_post ['E_emergency_CNumber'];
                $E_Company = $row_post['E_Company'];
                $C_name = $row_post['C_name'];
                $E_Number = $row_post['E_Number'];
                $E_Jdate = $row_post['E_Jdate'];
                $E_Status = $row_post['E_Status'];
                $E_Cmobile = $row_post['E_Cmobile'];
                $E_Position = $row_post['E_Position'];
                $E_Image = $row_post['E_Image'];

                if($E_Image==null){
                    $E_Image="empty.png";
                }


            }
        } else {
            echo "No results found.";
        }
    } else {
        // Query execution error
        echo "Query error: " . mysqli_error($conn);
    }
}


// age caluclation
$birthdate = $E_Bday;
$today = new DateTime();
$diff = $today->diff(new DateTime($birthdate));
$years = $diff->y;
$months = $diff->m;
$days = $diff->d;
?>
