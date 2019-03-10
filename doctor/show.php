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
$user =    $_SESSION['userid'];
extract($_GET);
$record='';
if(isset($aid))
{
    $record = mysqli_query($con,"SELECT * FROM appointment WHERE aid=$aid");
    extract(mysqli_fetch_array($record));
}


    $user =    $_SESSION['userid'];
$arecord = mysqli_query($con,"SELECT * FROM appointment WHERE doctor_id='$user' and answer is null order by query_date desc LIMIT 3");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dr. <?php echo $row['doctor_name'];?></title>

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
    <script src='../js/jquery.js'></script>
</head>

<body>

    <div id="wrapper">

         <!--Navigation--> 
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
                    <a href="#">Welcome ! <?php echo $row['doctor_name'];?></a>  
                </li>
               
            </ul>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <?php
                            while($qrow = mysqli_fetch_array($arecord))
                            {
                                    $precord = mysqli_query($con,"SELECT img,patient_name FROM patient WHERE patient_id=".$qrow['patient_id']);

                                    $prow = mysqli_fetch_array($precord);


                        ?>
			<li class="message-preview">
                            <a href="reply.php?aid=<?php echo $qrow['aid'];?>">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="../patient/<?php echo $prow['img'];?>" alt="" height="50" width="50">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong id="pname"><?php echo $prow['patient_name'];?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?php echo $qrow['query_date'];?></p>
                                        <p><?php echo $qrow['query'];?></p>
                                    </div>
                                </div>
                            </a>
                        </li>	
<?php
	}
?>
                        <li class="message-footer">
                            <a href="inbox.php">Read All New Messages</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="title"><?php echo $row['doctor_name'];?></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-user"></i> Profile</a>
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
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-bookmark"></i> Profile</a>
                    </li>
                    <li>
                            <a href="inbox.php"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Reply
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1" style="background: #66afe9;">
                        <div class="row" style="padding:15px;">
                            <div class="col-lg-2"><span>Patient Name</span></div>
                            <div class="col-lg-10"><input type="text" class="disabled form-control" disabled="" value="<?php echo $patient_id;?>"/></div>
                        </div>
                        <div class="row" style="padding:15px;">
                            <div class="col-lg-2"><span>Query Date</span></div>
                            <div class="col-lg-10"><input type="text" class="disabled form-control" disabled="" value="<?php echo $query_date;?>"/></div>
                        </div>
                        <div class="row" style="padding:15px;">
                            <div class="col-lg-2"><span>Query</span></div>
                            <div class="col-lg-10"><textarea disabled="" style="resize: vertical;max-height: 100px;min-height: 50px;" class="form-control"><?php echo $query;?></textarea></div>
                        </div>
                        <div class="row" style="padding:15px;">
                            <div class="col-lg-2"><span>Reply</span></div>
                            <div class="col-lg-10"><textarea  disabled="" style="resize: vertical;max-height: 100px;min-height: 50px;" class="form-control"><?php echo $answer;?></textarea></div>
                        </div>
                    </div>
                </div>
            </div>
             <!--/.container-fluid--> 

        </div>
         <!--/#page-wrapper--> 

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
    
    
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
