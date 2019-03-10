<?php
session_start();
include_once '../includes/config.php';

        mysqli_query($con,"update patient set mobile='".$_REQUEST['patientMobile']."' where patient_id='".$_SESSION['userid']."'");
//        echo mysql_error();
        $_SESSION['username']=$_REQUEST['patientMobile'];
        echo $_REQUEST['patientMobile'];

?>