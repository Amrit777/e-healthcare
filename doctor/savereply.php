<?php
session_start();

include_once '../includes/config.php';
    
    
    if(isset($_SESSION['user']) && isset($_SESSION['doctor']))
    {
        $record = mysqli_query($con,"SELECT * FROM doctors WHERE doctor_id='".$_SESSION['userid']."'");
        if(mysqli_num_rows($record)>0)
        {
            $row = mysqli_fetch_array($record);
        }
    }
    else if(isset($_SESSION['user']) && isset($_SESSION['patient'])){
        header('location:../patient/index.php');   
    }
    else
    {
        header('location:../index.php');
    }
    
    if(isset($_REQUEST['aid']))
	{
        mysqli_query($con,"update appointment set answer='".$_REQUEST['reply']."',reply_date=now() 
		where aid=".$_REQUEST['aid']);
    }
    
    header('location:inbox.php');
?>