<?php
    include_once './includes/config.php';
	include_once 'includes/header.php';
	
?>
<?php
    session_start();
	if(isset($_SESSION['user']) && isset($_SESSION['patient']))
    {
        header('location:patient/index.php');   
    }
    if(isset($_REQUEST['btn-patient']))
    {
        $uname = $_REQUEST['username'];
        $upass = $_REQUEST['password'];

        $record = mysqli_query($con,"SELECT * FROM patient WHERE email='".$uname."'");
        if(mysqli_num_rows($record)>0)
        {
            $row = mysqli_fetch_array($record);
            if($row['password']==$upass)
            {
                $_SESSION['userid'] = $row['patient_id'];
                $_SESSION['user'] = $row['patient_name'];
                $_SESSION['patient'] = "1";
                header("location:patient/index.php");
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
	   <link rel="stylesheet" href="css/plog.css">
	   
</head>

<body>
  <div class="login-page">
  <div class="form">
     <form class="login-form" method="post" onSubmit="checkvalidation">
      <input type="email" name="username" placeholder="patient@xyz.com"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit" name="btn-patient">login</button>
      <p class="message">Not registered? <a href="pat_reg.php">Create an account</a></p>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
		
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