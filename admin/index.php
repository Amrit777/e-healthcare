<?php
session_start();
    include_once '../includes/config.php';
    extract($_REQUEST);
    if(isset($btnLogin))
    {
        $record = mysqli_query($con,"SELECT * FROM admin WHERE username='".$email."' and password='".$pass."'");
        if(mysqli_num_rows($record)>0)
        {
                $_SESSION['user'] = $uname;
                header("location:try.php");
        }   
        else
            {
                $error="Invalid User Name or Password";
            }
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-HealthCare</title>

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
    <link href="../css/contextual-popovers.css" rel="stylesheet"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../js/jquery.js"></script>
    <script src="../js/custom.js"></script>
    </head>
    <body style="background-image: url('images/photo_bg.jpg');background-size: 100% 160%">
        <div class="container">
            <div class="row hidden-md hidden-sm hidden-xs visible-lg" style='height: 150px;'></div> 
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-info" style="padding: 15px;">
                        <div class="panel-heading text-center text-uppercase">
                            <h1 class="panel-title">Login</h1>
                        </div>
                        <div class="panel-body">
                            <form method="post">
                                <div class="row" style="margin-bottom: 15px;">
                                    <input type="text" class="form-control" placeholder="Email" name="email" id="adminemail" data-toggle="popover" title="Email" data-content="Please Enter the Email" data-trigger='manual'>
                                </div>
                                <div class="row" style="margin-bottom: 15px;">
                                    <input type="password" class="form-control" placeholder="Password" name="pass" id="adminpassword" data-toggle="popover" title="Password" data-content="Please Enter the Password" data-trigger='manual'>
                                </div>
                                <div class="row" style='margin-bottom:-15px;'>
                                    <input type="submit" name="btnLogin" value="SignIn" class="btn btn-block btn-info form-control" >
                                </div>
                            </form>
                        </div>
                        <?php
                            if(isset($error))
                            {
                        ?>
                        <div class=" panel-footer text-danger clearfix" style="margin-top: 15px;">
                                <?php echo $error;?>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/bootstrap.js"></script>
    </body>
</html>
