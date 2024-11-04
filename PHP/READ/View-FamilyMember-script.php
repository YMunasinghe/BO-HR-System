<?php
      $select_customer = "SELECT * FROM family_member WHERE E_id ='$E_id'";
      $run_query = mysqli_query($conn, $select_customer);
      if ($run_query) {
      if (mysqli_num_rows($run_query) > 0) {
          // Fetch the row from the query result
          $row_post = mysqli_fetch_assoc($run_query);

          // Assign values to variables
          $E_id = $row_post['E_id'];
          $FM1_Name = $row_post['FM1_Name'];
          $FM1_Relationship = $row_post['FM1_Relationship'];
          $FM1_Age = $row_post['FM1_Age'];
          $FM1_Ocupation = $row_post['FM1_Ocupation'];

          $FM2_Name = $row_post['FM2_Name'];
          $FM2_Relationship = $row_post['FM2_Relationship'];
          $FM2_Age = $row_post['FM2_Age'];
          $FM2_Ocupation = $row_post['FM2_Ocupation'];

          $FM3_Name = $row_post['FM3_Name'];
          $FM3_Relationship = $row_post['FM3_Relationship'];
          $FM3_Age = $row_post['FM3_Age'];
          $FM3_Ocupation = $row_post['FM3_Ocupation'];

          $FM4_Name = $row_post['FM4_Name'];
          $FM4_Relationship = $row_post['FM4_Relationship'];
          $FM4_Age = $row_post['FM4_Age'];
          $FM4_Ocupation = $row_post['FM4_Ocupation'];

          $FM5_Name = $row_post['FM5_Name'];
          $FM5_Relationship = $row_post['FM5_Relationship'];
          $FM5_Age = $row_post['FM5_Age'];
          $FM5_Ocupation = $row_post['FM5_Ocupation'];
      }
    }
  ?>
