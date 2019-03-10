<?php
session_start();

include_once '../includes/config.php';
        mysqli_query($con,"update doctors set specialization='".$_REQUEST['specialization']."' where doctor_id='".$_SESSION['userid']."'");
//        echo mysql_error();
        echo $_REQUEST['specialization'];

?>