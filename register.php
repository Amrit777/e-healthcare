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
    
    if(isset($_SESSION['user']) && isset($_SESSION['doctor']))
    {
        header('location:doctor/index.php');   
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
    if(isset($_REQUEST['btn-doctor']))
    {extract($_REQUEST);
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
        <div class="row visible-lg hidden-md hidden-sm hidden-xs visible-lg" style="height:75px;margin:0px">

        </div>
        <div class="col-lg-3 col-lg-offset-1">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="text-center">Patient Registration</h1>
                </div>
                <div class="panel-body">
                    <form onSubmit="return checkvalidation()" method="post">
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" id="pname" autocomplete="off" class="form-control" name="pname" placeholder="Patient's Name" aria-describedby="sizing-addon1" data-toggle="popover" title="Name" data-content="Please Enter the Patient Name" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="text" id="pmobile" autocomplete="off" class="form-control" name="pmobile" placeholder="Patient's Mobile" aria-describedby="sizing-addon1" data-toggle="popover" title="Contact" data-content="Please Enter the Patient Contact" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-map-marker"></span></span>
                            <input type="text" id="paddress" autocomplete="off" class="form-control" name="paddress" placeholder="Patient's Address" aria-describedby="sizing-addon1" data-toggle="popover" title="Address" data-content="Please Enter the Patient Address" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="text" id="pdob" autocomplete="off" class="form-control" name="pdob" placeholder="Patient's DOB" aria-describedby="sizing-addon1" data-toggle="popover" title="DOB" data-content="Please Enter the Patient DOB" data-trigger='manual'>
                        </div>
						<div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1">@</span>
                            <input type="text" id="pemail" autocomplete="off" class="form-control" name="pemail" placeholder="Patient's Email" aria-describedby="sizing-addon1" data-toggle="popover" title="Email" data-content="Please Enter the Patient ID" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" id="ppassword" name="password" placeholder="Password" aria-describedby="sizing-addon1"  data-toggle="popover" title="Password" data-content="Please Enter the Password" data-trigger='manual'>
                        </div>

                        <input type="submit" value = "Create Account" name="btn-patient" class="btn btn-primary btn-lg btn-block"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-1 hidden-md hidden-sm hidden-xs visible-lg">
            <div style="border-right:5px solid #337ab7;height:540px;width:50px; margin:0px"></div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="text-center">Donor Registration</h1>
                </div>
                <div class="panel-body">
                    <form onSubmit="return checkDoctor()" method="post">
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" id="dname" autocomplete="off" class="form-control" name="dname" placeholder="Doctor's Name" aria-describedby="sizing-addon1" data-toggle="popover" title="Name" data-content="Please Enter the Doctor Name" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="text" id="dmobile" autocomplete="off" class="form-control" name="dmobile" placeholder="Doctor's Mobile" aria-describedby="sizing-addon1" data-toggle="popover" title="Contact" data-content="Please Enter the Doctor Contact" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-map-marker"></span></span>
                            <input type="text" id="daddress" autocomplete="off" class="form-control" name="daddress" placeholder="Doctor's Address" aria-describedby="sizing-addon1" data-toggle="popover" title="Address" data-content="Please Enter the Doctor Address" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="text" id="ddob" autocomplete="off" class="form-control" name="ddob" placeholder="Doctor's DOB" aria-describedby="sizing-addon1" data-toggle="popover" title="DOB" data-content="Please Enter the Doctor DOB" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" id="dedu" autocomplete="off" class="form-control" name="dedu" placeholder="Education" aria-describedby="sizing-addon1" data-toggle="popover" title="Education" data-content="Please Enter the Doctor Education" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-arrow-right"></span></span>
                            <input type="text" id="dspe" autocomplete="off" class="form-control" name="dspe" placeholder="Specialization" aria-describedby="sizing-addon1" data-toggle="popover" title="Specialization" data-content="Please Enter the Doctor Specialization" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="text" id="dexp" autocomplete="off" class="form-control" name="dexp" placeholder="Doctor's Experiance" aria-describedby="sizing-addon1" data-toggle="popover" title="Experiance" data-content="Please Enter the Doctor Experiance" data-trigger='manual'>
                        </div>
						<div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1">@</span>
                            <input type="text" id="demail" autocomplete="off" class="form-control" name="demail" placeholder="Doctor's Email" aria-describedby="sizing-addon1" data-toggle="popover" title="Email" data-content="Please Enter the Doctor email" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" id="dpassword" name="dpassword" placeholder="Password" aria-describedby="sizing-addon1"  data-toggle="popover" title="Password" data-content="Please Enter the Password" data-trigger='manual'>
                        </div>

                        <input type="submit" value = "Create Account" name="btn-doctor" class="btn btn-primary btn-lg btn-block"/>
                    </form>
                </div>
            </div>
        </div>
		<div class="col-lg-1 hidden-md hidden-sm hidden-xs visible-lg">
            <div style="border-right:5px solid #337ab7;height:540px;width:50px;margin:0px"></div>
        </div>
		
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="text-center">Doctor Registration</h1>
                </div>
                <div class="panel-body">
                    <form onSubmit="return checkDoctor()" method="post">
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" id="dname" autocomplete="off" class="form-control" name="dname" placeholder="Doctor's Name" aria-describedby="sizing-addon1" data-toggle="popover" title="Name" data-content="Please Enter the Doctor Name" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="text" id="dmobile" autocomplete="off" class="form-control" name="dmobile" placeholder="Doctor's Mobile" aria-describedby="sizing-addon1" data-toggle="popover" title="Contact" data-content="Please Enter the Doctor Contact" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-map-marker"></span></span>
                            <input type="text" id="daddress" autocomplete="off" class="form-control" name="daddress" placeholder="Doctor's Address" aria-describedby="sizing-addon1" data-toggle="popover" title="Address" data-content="Please Enter the Doctor Address" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="text" id="ddob" autocomplete="off" class="form-control" name="ddob" placeholder="Doctor's DOB" aria-describedby="sizing-addon1" data-toggle="popover" title="DOB" data-content="Please Enter the Doctor DOB" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" id="dedu" autocomplete="off" class="form-control" name="dedu" placeholder="Education" aria-describedby="sizing-addon1" data-toggle="popover" title="Education" data-content="Please Enter the Doctor Education" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-arrow-right"></span></span>
                            <input type="text" id="dspe" autocomplete="off" class="form-control" name="dspe" placeholder="Specialization" aria-describedby="sizing-addon1" data-toggle="popover" title="Specialization" data-content="Please Enter the Doctor Specialization" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="text" id="dexp" autocomplete="off" class="form-control" name="dexp" placeholder="Doctor's Experiance" aria-describedby="sizing-addon1" data-toggle="popover" title="Experiance" data-content="Please Enter the Doctor Experiance" data-trigger='manual'>
                        </div>
						<div class="input-group input-group-lg" style="margin-bottom: 15px;">
                            <span class="input-group-addon" id="sizing-addon1">@</span>
                            <input type="text" id="demail" autocomplete="off" class="form-control" name="demail" placeholder="Doctor's Email" aria-describedby="sizing-addon1" data-toggle="popover" title="Email" data-content="Please Enter the Doctor email" data-trigger='manual'>
                        </div>
                        <div class="input-group input-group-lg" style="margin-bottom: 15px;">
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