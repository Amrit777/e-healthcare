<?php
    session_start();

    include_once './includes/config.php';
	include_once 'includes/header.php';
?>
<?php
if(isset($_SESSION['user']) && isset($_SESSION['doctor']))
    {
        header('location:doctor/index.php');   
    }
	if(isset($_REQUEST['btn-doctor']))
    {
		extract($_REQUEST);
        $emailidfetch = mysqli_query($con,"SELECT * from doctors where email='$demail'");
        if(mysqli_num_rows($emailidfetch)>0){$_SESSION['custom_error']="Email id already exists...!!!";}
        else
        {
        $query = "SELECT max(doctor_id) as maxid FROM doctors";
        $primary_key = mysqli_query($con,$query);
        $primary_row = mysqli_fetch_array($primary_key);
        $nextid = $primary_row['maxid']+1;
        
        $imgpath = "images/$nextid.png";
        copy("doctor/images/default-user.png", "doctor/images/$nextid.png");
        $ddob = changeDateFormat($ddob);
        $query =  "INSERT INTO doctors(doctor_id, doctor_name, img, email, password, address, mobile, dob, createdate,specialization,qualification,exprience) VALUES ($nextid,'$dname','$imgpath','$demail','$dpassword','$daddress','$dmobile','$ddob',now(),'$dspe','$dedu','$dexp')";
        mysqli_query($con,$query);
        $_SESSION['userid'] = $nextid;
        $_SESSION['user'] = $dname;
        $_SESSION['doctor'] = "1";
        
        echo "<br/>".mysqli_error();
        header("location:doctor/index.php");}
    }
    function changeDateFormat($d){
        $datearr = explode("/", $d);
        $d = $datearr[2]."-".$datearr[1]."-".$datearr[0];
        return $d;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
    <link rel="stylesheet" type="text/css" href="css/drreg.css">
</head>
<body>
<div class="col-sm-6 col-sm-offset-3 col-md-6 col-lg-8 col-lg-offset-2 col-md-offset-4">
    <div style="height:580px; width:700px; margin:auto; margin-top:10px; margin-bottom:10px; box-shadow:16px 1px 10px gray;">

                  <div class="panel-heading">
                    <h1 class="text-center">Doctor Registration</h1>
                </div>
                <div class="col-lg-6 col-lg-offset-3 ">
                    <form onSubmit="return checkDoctor()" method="post">

                        <div class="input-group input-group-lg" style="margin-bottom: 2px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" id="dname" autocomplete="off" class="form-control" name="dname" placeholder="Doctor's Name" aria-describedby="sizing-addon1" data-toggle="popover" title="Name" data-content="Please Enter the Doctor Name" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 2px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="text" id="dmobile" autocomplete="off" class="form-control" name="dmobile" placeholder="Doctor's Mobile" aria-describedby="sizing-addon1" data-toggle="popover" title="Contact" data-content="Please Enter the Doctor Contact" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 2px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-map-marker"></span></span>
                            <input type="text" id="daddress" autocomplete="off" class="form-control" name="daddress" placeholder="Doctor's Address" aria-describedby="sizing-addon1" data-toggle="popover" title="Address" data-content="Please Enter the Doctor Address" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 2px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="text" id="ddob" autocomplete="off" class="form-control" name="ddob" placeholder="Doctor's DOB" aria-describedby="sizing-addon1" data-toggle="popover" title="DOB" data-content="Please Enter the Doctor DOB" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 2px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" id="dedu" autocomplete="off" class="form-control" name="dedu" placeholder="Education" aria-describedby="sizing-addon1" data-toggle="popover" title="Education" data-content="Please Enter the Doctor Education" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 2px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-arrow-right"></span></span>
                            <input type="text" id="dspe" autocomplete="off" class="form-control" name="dspe" placeholder="Specialization" aria-describedby="sizing-addon1" data-toggle="popover" title="Specialization" data-content="Please Enter the Doctor Specialization" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 2px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="text" id="dexp" autocomplete="off" class="form-control" name="dexp" placeholder="Doctor's Experiance" aria-describedby="sizing-addon1" data-toggle="popover" title="Experiance" data-content="Please Enter the Doctor Experiance" data-trigger='manual'>
                        </div>
						<div class="input-group input-group-lg" style="margin-bottom: 2px;">
                            <span class="input-group-addon" id="sizing-addon1">@</span>
                            <input type="text" id="demail" autocomplete="off" class="form-control" name="demail" placeholder="Doctor's Email" aria-describedby="sizing-addon1" data-toggle="popover" title="Email" data-content="Please Enter the Doctor email" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 2px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" id="dpassword" name="dpassword" placeholder="Password" aria-describedby="sizing-addon1"  data-toggle="popover" title="Password" data-content="Please Enter the Password" data-trigger='manual'>
                        </div>

                        <input type="submit" value = "Create Account" name="btn-doctor" class="btn btn-primary btn-lg btn-block"/>
                    </form>
                </div>
            </div>
        </div>
		
		
		<?php
            if(isset($_SESSION['custom_error']))
            {
        ?>
                <script>alert("Error!<?php echo $_SESSION['custom_error'];?>");</script>
                
        <?php
                unset($_SESSION['custom_error']);
            }
        ?>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/register.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
        <script>
            $('input#pdob').datepicker({
            format: "dd/mm/yyyy", clearBtn: true,startDate: "01-01-1950",
            endDate: "31-12-2000",
            todayHighlight: true
        });
        $('input#ddob').datepicker({
            format: "dd/mm/yyyy", clearBtn: true,startDate: "01-01-1950",
            endDate: "31-12-2000",
            todayHighlight: true
        });
            </script>
    </body>
</html>