<?php
session_start();
    include_once '../includes/config.php';
    $record = mysqli_query($con,"SELECT max(aid) as aid FROM appointment");
    if(mysqli_num_rows($record)>0)
    {
        $row = mysqli_fetch_array($record);
        $next_row = $row['aid']+1;
        $doctor = $_REQUEST['doctor'];
        $query = $_REQUEST['query'];
        $user=$_SESSION['userid'];
        $query=  mysqli_query($con,"insert into appointment(aid,doctor_id,patient_id,query_date,query) values('$next_row','$doctor','$user',now(),'$query')");
        if($query)
        {
            $_SESSION['add_appointment']="1";
            header('location:appointment.php');
        }
 else {echo mysqli_error();}
        
    }
?>