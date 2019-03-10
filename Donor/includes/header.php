<?php
session_start();
include_once '../includes/config.php';
$record = mysqli_query($con,"SELECT * FROM donor_reg WHERE email='".$_SESSION['user']."'");
$row=mysqli_fetch_array($record);      
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $row['uname'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap-select.min.css" rel="stylesheet"/>
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <script src="../js/jquery.js"></script>
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
                    <a href="#">Welcome ! <?php echo $row['uname'];?></a>  
                </li>
               
            </ul>
			
			<ul class="nav navbar-right top-nav">
			<li><a href="index.php">Home</li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <?php
                            while($qrow = mysqli_fetch_array($record))
                            {
                                    $drecord = mysqli_query($con,"SELECT img,doctor_name FROM doctors WHERE doctor_id=".$qrow['doctor_id']);

                                    $drow = mysqli_fetch_array($drecord);


                        ?>
			<li class="message-preview">
                            <a href="showreply.php?aid=<?php echo $qrow['aid'];?>">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="../doctor/<?php echo $drow['img'];?>" alt="" height="50" width="50">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong id="pname"><?php echo $drow['doctor_name'];?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?php echo $qrow['reply_date'];?></p>
                                        <p><?php echo $qrow['answer'];?></p>
                                    </div>
                                </div>
                            </a>
                        </li>	
<?php
	}
?>
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
					<span class="title"><?php echo $row['uname'];?></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=""><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php?logout="><i class="fa fa-fw fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-bookmark"></i> Profile</a>
                    </li>
                    <li>
                        <a href="request.php"><i class="fa fa-fw fa-dashboard"></i>View Request</a>
                    </li>
                     
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
