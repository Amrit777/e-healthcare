<?php
session_start();
include_once '../includes/config.php';

mysqli_query($con,"update patient set address='".$_REQUEST['patientAddress']."' where patient_id='".$_SESSION['userid']."'");
//        echo mysql_error();
  echo $_REQUEST['patientAddress'];

?>