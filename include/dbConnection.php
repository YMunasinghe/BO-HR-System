<?php
$username="root";
$password="";
$host="localhost";
$database="sql_oceanhr_bosy";

// $username="sql_oceanhr_bosy";
// $password="FwXYTNhDASyKFYmR";
// $host="localhost";
// $database="sql_oceanhr_bosy";

$conn=new mysqli($host,$username,$password,$database);

if(!$conn->connect_errno){
    // echo 'Connected Successfully !';
}else{
    echo 'Error : '.$conn->connect_error;
}
