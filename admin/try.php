<?php
    session_start();

    include_once '../includes/config.php';
    
    
    if(isset($_SESSION['user']) && $_SESSION['user']!="admin")
    {
	header('location:index.php');
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                    <a href="try.php">Welcome ! Admin</a>  
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
                        <a href="contact.php"><i class="fa fa-fw fa-bookmark"></i>Enquiry</a>
                    </li>
	
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="margin-left:50px">
			<?php 
				$d=mysqli_query($con,"select * from doctors");
				$cd= mysqli_num_rows($d);

				$p=mysqli_query($con,"select * from patient");
				$cp= mysqli_num_rows($p);

				$a=mysqli_query($con,"select * from appointment");
				$ad= mysqli_num_rows($a);

				$dd=mysqli_query($con,"select * from donor_reg");
				$dd= mysqli_num_rows($dd);
				
				$ed1=mysqli_query($con,"select * from contact");
				$edd= mysqli_num_rows($ed1);
				
			?>

<a href="doctor.php" class="btn btn-info btn-lg" title="Click here to See details">Total Doctors (<?php echo $cd;?>)</a>
<hr><a href="patient.php" class="btn btn-info btn-lg" title="Click here to See details">Total Patient (<?php echo $cp;?>)</a>
<hr><a href="donor.php" class="btn btn-info btn-lg" title="Click here to See details">Total Donor (<?php echo $dd;?>)</a>
<hr><a href="appointment.php" class="btn btn-info btn-lg" title="Click here to See details">Total Appointment (<?php echo $ad;?>)</a>
<hr><a href="contact.php" class="btn btn-info btn-lg" title="Click here to See details">Total Enquiry (<?php echo $edd;?>)</a>            
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    $("#profilepic").attr('src',data);
                },
                error: function() 
	    	{
	    	} 	        
	   })
       }));
        $("#updateName").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "updatename.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    $('title').text(data);
                    $('span.title').text(data);
                    $("span.doctor_name").children('span').text(data);
                    $('input[type=text]#doctorName').val('');
                    $('#myName').modal('hide');
                },
                error: function() 
	    	{
	    	} 	        
	   });
	}));
        $("#updateSpecialization").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "updatespecialization.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    $("span.specialization").children('span').text(data);
                    $('input[type=text]#specialization').val('');
                    $('#mySpecialization').modal('hide');
                },
                error: function() 
	    	{
	    	} 	        
	   });
	}));
        
        $("#updateMobile").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "updatemobile.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    $("label.mobile").children('span').text(data);
                    $('input[type=text]#doctorMobile').val('');
                    $('#myMobile').modal('hide');
                },
                error: function() 
	    	{
	    	} 	        
	   });
	}));
        
        $( "span.doctor_name" ).hover(
            function() {
                $( this ).children("a").css('opacity',"1");
            }, function() {
                $( this ).children( "a" ).css('opacity',"0");
            }
        );

        $( "small.specialization" ).hover(
            function() {
                $( this ).children("a").css('opacity',"1");
            }, function() {
                $( this ).children( "a" ).css('opacity',"0");
            }
        );
        $("label.mobile" ).hover(
            function() {
                $( this ).children("a").css('opacity',"1");
            }, function() {
                $( this ).children( "a" ).css('opacity',"0");
            }
        );
    });
    </script>
    
    
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
