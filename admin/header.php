<?php
    session_start();

    include_once '../includes/config.php';
    
    $record='';
    if(isset($_SESSION['user']) && $_SESSION['user']=="admin")
    {
        
    }
    else
    {
        echo "hello";
//        header('location:../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="doctor.php">Doctor</a>-->
            </div>
            <!-- Top Menu Items -->
                       <ul class="nav navbar-left top-nav">
                <li >
                    <a href="home.php">Welcome Admin </a>  
                </li>
               
            </ul>

			<ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="../logout.php?logout="><i class="fa fa-fw fa-power-off"></i> Logout</a>
                </li>
            </ul>
 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="patient.php"><i class="fa fa-fw fa-bookmark"></i> Patient</a>
                    </li>
                    <li>
                        <a href="doctor.php"><i class="fa fa-fw fa-bookmark"></i> Doctor</a>
                    </li>
                     <li>
                        <a href="donor.php"><i class="fa fa-fw fa-bookmark"></i> Donor</a>
                    </li>
					<li>
                        <a href="appointment.php"><i class="fa fa-fw fa-bookmark"></i> Appointment</a>
                    </li>
					<li>
                        <a href="request.php"><i class="fa fa-fw fa-bookmark"></i>Blood Request</a>
                    </li>
					<li>
                        <a href="contact.php"><i class="fa fa-fw fa-bookmark"></i>Enquiry</a>
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
