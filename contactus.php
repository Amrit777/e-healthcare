<?php 
include('includes/header.php');
include('includes/config.php');
extract($_POST);
if(isset($contact))
{
	$q=mysqli_query($con,"insert into contact values('','$n','$eid','$mob','$Msg',now())");
	if($q)
	{
		$err="<h4 style='color:green'>Admin will contact to you Soon</h4>";
	}
	else
	{
		$err="<h4 style='color:green'>Some error occured</h4>";
		
	}
}
 ?>
 <!DOCTYPE html>
 <html>
 <body>
  
        <div class="col-lg-6 col-lg-offset-3">
        <?php echo @$err; ?>
		<form id="contactForm" class="form-horizontal bv-form" method="post" action="#" >
        <button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
            <fieldset class="col-sm-12">
                <legend>Contact Form</legend>

                <div class="form-group">
                    <label for="Name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" id="Name" name="n" class="form-control" placeholder="* Enter Name" data-bv-field="Name">
                        </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="Name" data-bv-result="NOT_VALIDATED" style="display: none;">Your name is required</small></div>
                </div>

                <div class="form-group">
                    <label for="Email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                            <input type="email" id="Email" name="eid" class="form-control" placeholder="* Enter Email" data-bv-field="Email">
                        </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="Email" data-bv-result="NOT_VALIDATED" style="display: none;">Your email is required</small><small class="help-block" data-bv-validator="emailAddress" data-bv-for="Email" data-bv-result="NOT_VALIDATED" style="display: none;">Your email is not valid</small></div>
                </div>

                <div class="form-group">
                    <label for="Phone" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                            <input type="text" id="Phone" name="mob" class="form-control" placeholder="Enter Phone Number">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Message" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-comment fa-fw"></i></span>
                            <textarea id="Message" name="Msg" class="form-control" rows="5" data-bv-field="Message" style="resize:none;margin: 0px;  height: 114px;"></textarea>
                        </div>
                    <small class="help-block" data-bv-validator="notEmpty" data-bv-for="Message" data-bv-result="NOT_VALIDATED" style="display: none;">Your message is required</small></div>
                </div>

                
                <div class="form-group">                  <div class="col-sm-2"></div>
                    <div class="col-sm-10" align="center">
                    <button type="submit" name="contact" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <script type="text/javascript" src="js/jquery.js"></script>
        
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        </div>
        </body>
</html>