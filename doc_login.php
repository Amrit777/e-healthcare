<?php
    include_once 'includes/config.php';
	include_once 'includes/header.php';
	
?>
<?php
    session_start();
	if(isset($_SESSION['user']) && isset($_SESSION['doctor']))
    {
        header('location:index.php');   
    }
	if(isset($_REQUEST['btn-doctor']))
    {
        $uname = $_REQUEST['username'];
        $upass = $_REQUEST['password'];

        $record = mysqli_query($con,"SELECT * FROM doctors WHERE email='".$uname."'");
        if(mysqli_num_rows($record)>0)
        {
            $row = mysqli_fetch_array($record);
            if($row['password']==$upass)
            {
                $_SESSION['userid'] = $row['doctor_id'];
                $_SESSION['user'] = $row['doctor_name'];
                $_SESSION['doctor'] = "1";
                header("location:doctor/index.php");
            }
            else
            {
                $_SESSION['custom_error']="Invalid User Name or Password";
            }
        }
        else
        {
            $_SESSION['custom_error']="Invalid User Name or Password";
        }
    }
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
       <link rel="stylesheet" href="css/loginstyle.css">
	   <link rel="stylesheet" href="css/drlog.css">

</head>

<body>
  <div class="login-page">
  <div class="form">
     <form class="login-form" method="post" onSubmit="checkvalidation">
      <input type="email" name="username" placeholder="Doctor@xyz.com"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit" name="btn-doctor">login</button>
      <p class="message">Not registered? <a href="doc_reg.php">Create an account</a></p>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>

<!--<div class="row visible-lg hidden-md hidden-sm hidden-xs" style="height:50px;margin: 0px"></div>

 <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="text-center">Doctor Login</h1>
                </div>
                <div class="panel-body">
                    <form method="get" onSubmit="return checkValidations()">
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1">@</span>
                            <input type="text" class="form-control" name="username" id="doctor" placeholder="Doctor's Email" aria-describedby="sizing-addon1" data-toggle="popover" title="Email" data-content="Please Enter the Email-ID" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" name="password" id="docpass" placeholder="Password" aria-describedby="sizing-addon1" data-toggle="popover" title="Email" data-content="Please Enter the Password" data-trigger='manual'>
                        </div>

                        <input type="submit" value = "Login" name="btn-doctor" class="btn btn-primary btn-lg btn-block"/>
                    </form>
                </div>
            </div>-->
			
 <?php
            if(isset($_SESSION['custom_error']))
            {
        ?>
               <div class="alert alert-danger fade in col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-1 col-sm-1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Error!</strong> <?php echo $_SESSION['custom_error'];?>
                </div>
        <?php
                unset($_SESSION['custom_error']);
            }
        ?>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>