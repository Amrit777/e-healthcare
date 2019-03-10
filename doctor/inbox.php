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
$record = mysqli_query($con,"SELECT * FROM appointment WHERE doctor_id='$user' and answer is null order by query_date desc LIMIT 3");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $row['doctor_name'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
     <link href="../css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
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
                    <a href="#">Welcome ! <?php echo $row['doctor_name'];?></a>  
                </li>
               
            </ul>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <?php
                        
                            while($qrow = mysqli_fetch_array($record))
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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Inbox
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-responsive table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>Sender</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $inbox = mysqli_query($con,"SELECT * FROM appointment WHERE doctor_id='".$_SESSION['userid']."'");
                        while($irow = mysqli_fetch_array($inbox))
                        {
                    ?>
                    <tr>
                        <td>
                            <?php
                                $patrec = mysqli_query($con,"SELECT patient_name FROM patient WHERE patient_id=".$irow['patient_id']);
                                $prow = mysqli_fetch_array($patrec);
                                echo $prow['patient_name'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $irow['query_date'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $irow['query'];
                            ?>
                        </td>
                        <td>
                            <?php
                                if($irow['answer']==''){
                            ?>
                            <a href="reply.php?aid=<?php echo $irow['aid']?>">Reply</a>
                            <?php
                                }
                                else
                                {
                            ?>
                            <a href="show.php?aid=<?php echo $irow['aid']?>">Show</a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]});
        } );
    </script>
</body>

</html>

