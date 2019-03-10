<?php
session_start();
include_once '../includes/config.php';
$imgName="images/".$_FILES['userImage']['name'];

mysqli_query($con,"update doctors set img='".$imgName."' where doctor_id='".$_SESSION['userid']."'");
move_uploaded_file($_FILES['userImage']['tmp_name'],"images/".$_FILES['userImage']['name']);

        echo $_REQUEST['img'];
?>