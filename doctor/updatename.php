<?php
session_start();
include_once '../includes/config.php';
        mysqli_query($con,"update doctors set doctor_name='".$_REQUEST['doctorName']."' where doctor_id='".$_SESSION['userid']."'");
//        echo mysql_error();
        echo $_REQUEST['doctorName'];

?>