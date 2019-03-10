<?php
session_start();
include_once '../includes/config.php';

        mysqli_query($con,"update patient set patient_name='".$_REQUEST['patientName']."' where patient_id='".$_SESSION['userid']."'");
//        echo mysql_error();
        echo $_REQUEST['patientName'];

?>