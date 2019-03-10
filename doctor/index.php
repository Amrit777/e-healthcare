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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                        </h1>
                        
                    </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Profile Picture</h4>
                        </div>
                        <form id="uploadForm" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input name="userImage" type="file" class="inputFile form-control" />
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Submit" class="btnSubmit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <div id="myName" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Doctor Name</h4>
                        </div>
                        <form id="updateName">
                            <div class="modal-body">
                                <input name="doctorName" id="doctorName" type="text" class="form-control" placeholder="Doctor Name"/>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Submit" class="btnSubmit btn btn-block btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <div id="mySpecialization" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Specialization</h4>
                        </div>
                        <form id="updateSpecialization">
                            <div class="modal-body">
                                <input name="specialization" id="specialization" type="text" class="form-control" placeholder="Specialization"/>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Submit" class="btnSubmit btn btn-block btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div id="myMobile" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Doctor Mobile</h4>
                            </div>
                            <form id="updateMobile">
                                <div class="modal-body">
                                    <input name="doctorMobile" id="doctorMobile" type="text" class="form-control" placeholder="Doctor Mobile"/>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Submit" class="btn btn-block btn-primary" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <a class="image-box" data-toggle="modal" data-target="#myModal" style="cursor: pointer">
                                    <img src="<?php echo $row['img'];?>" id="profilepic" class="img-responsive img-thumbnail" alt="">
                                    <div class="image-box-caption">
                                        <div class="image-box-caption-content">
                                            <div class="project-category text-faded">
                                                Change Image
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-10">
                                <h1>
                                    <span class="doctor_name" style="cursor: pointer">
                                        <span><?php echo $row['doctor_name'];?></span>     
                                    
                                    <a data-toggle="modal" data-target="#myName" style="text-decoration: none;opacity: 0">
                                        <span style="font-size:15px;vertical-align: middle;color:black" class="glyphicon glyphicon-pencil"></span>
                                    </a></span>
                                    <br/>
                                    <small class="specialization" style="cursor:pointer">
                                        <span><?php echo $row['specialization'];?></span>
                                        <a data-toggle="modal" data-target="#mySpecialization" style="text-decoration: none;opacity: 0">
                                            <span style="font-size:15px;vertical-align: middle;color:black" class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </small></h1>
                                <label class="mobile">
                                    <span><?php echo $row['mobile'];?></span>
                                    <a data-toggle="modal" data-target="#myMobile" style="text-decoration: none;opacity: 0">
                                        <span style="font-size:12px;color:black" class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </label>
                            </div>
                        </div>
                        <div class="row visible-lg visible-md visible-sm hidden-xs" style="height:25px;">
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            Qualification
                                        </td>
                                        <td>
                                            <label><?php echo $row['qualification'];?></label>
                                            
                                        </td>
                                        <td>
                                            Date of Birth
                                        </td>
                                        <td>
                                            <label><?php echo $row['dob'];?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Experience
                                        </td>
                                        <td>
                                            <label><?php echo $row['exprience'];?> Years</label>
                                        </td>
                                        <td>
                                            Address
                                        </td>
                                        <td>
                                            <label><?php echo $row['address']?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td>
                                            Password
                                        </td>
                                        <td>
                                            <label>..........</label>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
					alert("image uploaded");
					$('#myModal').modal('hide');
					window.location="index.php";
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
