<?php
session_start();
include_once '../includes/config.php';
$imgName="images/".$_FILES['userImage']['name'];

mysqli_query($con,"update patient set img='".$imgName."' where patient_id='".$_SESSION['userid']."'");
move_uploaded_file($_FILES['userImage']['tmp_name'],"images/".$_FILES['userImage']['name']);

        echo $_REQUEST['img'];
?>