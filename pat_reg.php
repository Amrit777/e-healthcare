<?php
    session_start();

    include_once './includes/config.php';
	include_once 'includes/header.php';
?>
<?php
    if(isset($_SESSION['user']) && isset($_SESSION['patient']))
    {
        header('location:patient/index.php');   
    }
	
	if(isset($_REQUEST['btn-patient']))
    {
		extract($_REQUEST);
    
        $emailidfetch = mysqli_query($con,"SELECT * from patient where email='$pemail'");
        if(mysqli_num_rows($emailidfetch)>0){$_SESSION['custom_error']="Email id already exists...!!!";}
        else
        {
        $query = "SELECT max(patient_id) as maxid FROM patient";
        $primary_key = mysqli_query($con,$query);
        $primary_row = mysqli_fetch_array($primary_key);
        $nextid = $primary_row['maxid']+1;
        
        $imgpath = "images/$nextid.png";
        copy("patient/images/default-user.png", "patient/images/$nextid.png");
        $pdob = changeDateFormat($pdob);
        $query =  "INSERT INTO patient(patient_id, patient_name, img, email, password, mobile, address, dob, createdate) VALUES ($nextid,'$pname','$imgpath','$pemail','$password','$pmobile','$paddress','$pdob',now())";
        mysqli_query($con,$query);
        $_SESSION['userid'] = $nextid;
        $_SESSION['user'] = $pname;
        $_SESSION['patient'] = "1";
        
        echo "<br/>".mysqli_error();
        header("location:patient/index.php");
        }
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
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
    <link rel="stylesheet" type="text/css" href="css/preg.css">
</head>
<body style="padding-top: 90px">
<div class="col-sm-6 col-sm-offset-3 col-md-6 col-lg-8 col-lg-offset-2 col-md-offset-4">
    <div style="height:580px; width:700px; margin:auto; margin-top:10px; margin-bottom:10px; box-shadow:16px 1px 10px gray;">

                  <div class="panel-heading">
                    <h1 class="text-center">Patient Registration</h1>
                </div>
                <div class="col-lg-6 col-lg-offset-3 ">
                    <form onSubmit="return checkvalidation()" method="post">
                        <div class="input-group input-group-lg" style="margin-bottom: 5px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" id="pname" autocomplete="off" class="form-control" name="pname" placeholder="Patient's Name" aria-describedby="sizing-addon1" data-toggle="popover" title="Name" data-content="Please Enter the Patient Name" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 5px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="text" id="pmobile" autocomplete="off" class="form-control" name="pmobile" placeholder="Patient's Mobile" aria-describedby="sizing-addon1" data-toggle="popover" title="Contact" data-content="Please Enter the Patient Contact" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 5px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-map-marker"></span></span>
                            <input type="text" id="paddress" autocomplete="off" class="form-control" name="paddress" placeholder="Patient's Address" aria-describedby="sizing-addon1" data-toggle="popover" title="Address" data-content="Please Enter the Patient Address" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 5px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="text" id="pdob" autocomplete="off" class="form-control" name="pdob" placeholder="Patient's DOB" aria-describedby="sizing-addon1" data-toggle="popover" title="DOB" data-content="Please Enter the Patient DOB" data-trigger='manual'>
                        </div>
						<div class="input-group input-group-lg" style="margin-bottom: 5px;">
                            <span class="input-group-addon" id="sizing-addon1">@</span>
                            <input type="text" id="pemail" autocomplete="off" class="form-control" name="pemail" placeholder="Patient's Email" aria-describedby="sizing-addon1" data-toggle="popover" title="Email" data-content="Please Enter the Patient ID" data-trigger='manual'>
                        </div>
					    <div class="input-group input-group-lg" style="margin-bottom: 5px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" id="ppassword" name="password" placeholder="Password" aria-describedby="sizing-addon1"  data-toggle="popover" title="Password" data-content="Please Enter the Password" data-trigger='manual'>
                        </div>

                        <input type="submit" value = "Create Account" name="btn-patient" class="btn btn-primary btn-lg btn-block"/>
                    </form>
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