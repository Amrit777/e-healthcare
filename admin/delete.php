<?php
    include_once '../includes/config.php';
    extract($_REQUEST);
    if(isset($c_id))
	{
	mysqli_query($con,"delete from contact where c_id='".$c_id."'");
	header('location:contact.php');
    }
	
	//Doctor
	if(isset($doc_id))
	{
	mysqli_query($con,"delete from appointment where doctor_id='".$doc_id."'");
	
		
	mysqli_query($con,"delete from doctors where doctor_id='".$doc_id."'");
	header('location:doctor.php');
    }
	
	//Patients
	if(isset($p_id))
	{
	mysqli_query($con,"delete from appointment where patient_id='".$p_id."'");
	
		
	mysqli_query($con,"delete from patient where patient_id='".$p_id."'");
	header('location:patient.php');	
	
    }
	
	//Appointment
	if(isset($a_id))
	{
	mysqli_query($con,"delete from appointment where aid='".$a_id."'");
	header('location:appointment.php');
    }
	
	//Donor
	if(isset($dname))
	{
	mysqli_query($con,"delete from donor_reg where uname='".$dname."'");
	header('location:donor.php');
    }
	
	//Blood Request
	if(isset($request_id))
	{
	mysqli_query($con,"delete from blood_req where id='".$request_id."'");
	header('location:request.php');
    }
	
?>
