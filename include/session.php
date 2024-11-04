<?php
session_start();
if (!isset($_SESSION['U_id']) || (trim($_SESSION['U_id']) == '')) {
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['U_id'];

?>
