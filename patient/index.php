<?php
    session_start();

	include_once '../includes/config.php';
    
        
    if(isset($_SESSION['user']) && isset($_SESSION['patient']))
    {
        $record = mysqli_query($con,"SELECT * FROM patient WHERE patient_id='".$_SESSION['userid']."'");
        if(mysqli_num_rows($record)>0)
        {
            $row = mysqli_fetch_array($record);
        }
    }
    else if(isset($_SESSION['user']) && isset($_SESSION['doctor'])){
        header('location:../doctor/index.php');   
    }
    else
    {
        header('location:../index.php');
    }
    
    $user =    $_SESSION['userid'];
    $record = mysqli_query($con,"SELECT * FROM appointment WHERE patient_id='$user' and answer is not null order by reply_date desc LIMIT 3");
    include './includes/header.php';
?>

<script>
    $("a[href='index.php']").parent("li").addClass('active');
</script>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Profile Picture</h4>
                        </div>
                        <form id="uploadForm" method="post" action="upload.php" enctype="multipart/form-data">
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
                            <h4 class="modal-title">Patient Name</h4>
                        </div>
                        <form id="updateName">
                            <div class="modal-body">
                                <input name="patientName" id="patientName" type="text" class="form-control" placeholder="Patient Name"/>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Submit" class="btnSubmit" />
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
                            <h4 class="modal-title">Patient Mobile</h4>
                        </div>
                        <form id="updateMobile">
                            <div class="modal-body">
                                <input name="patientMobile" id="patientMobile" type="text" class="form-control" placeholder="Patient Mobile"/>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Submit" class="btnSubmit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="myAddress" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Patient Address</h4>
                        </div>
                        <form id="updateAddress">
                            <div class="modal-body">
                                <textarea name="patientAddress" style="height:200px;width:100%;resize: vertical" id="patientAddress" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Submit" class="btnSubmit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div id="myPassword" class="modal fade" role="dialog">
                <div class="modal-dialog">
                 <!--Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Patient Password</h4>
                        </div>
                        <form id="updatePassword">
                            <div class="modal-body">
                                <input type="password" name="patientPassword" id="patientpassword" class="form-control" placeholder="Enter New Pasword"/>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Submit" class="btnSubmit" />
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
                                    <span class="patient_name" style="cursor: pointer">
                                        <span><?php echo $row['patient_name'];?></span> 
                                        <a data-toggle="modal" data-target="#myName" style="opacity: 0">
                                            <span style="font-size:15px;vertical-align: middle;" class="glyphicon glyphicon-pencil"></span>
                                        </a>                                            
                                    </span>
                                    <br/>
                                    <small class='mobile'>
                                        <span><?php echo $row['mobile'];?> </span>
                                        <a  style="opacity: 0" data-toggle="modal" data-target="#myMobile">
                                            <span style="font-size:15px;vertical-align: middle;" class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </small>
                                </h1>
                            </div>
                        </div>
                        <div class="row visible-lg visible-md visible-sm hidden-xs" style="height:25px;">
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            Address
                                        </td>
                                        <td class="address">
                                            <label><?php echo $row['address'];?></label>
                                            <a data-toggle="modal" data-target="#myAddress" class="pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
                                        </td>
                                        <td>
                                            Date of Birth
                                        </td>
                                        <td class="dob">
                                            <label><?php echo $row['dob'];?></label>
                                            <!--<a data-toggle="modal" data-target="#myDob" class="pull-right"><span class="glyphicon glyphicon-pencil"></span></a>-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Password
                                        </td>
                                        <td class="password">
                                            <label>..........</label>
                                            <a data-toggle="modal" data-target="#myPassword" class="pull-right"><span class="glyphicon glyphicon-pencil"></span></a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!--</div>-->
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) 
	{
		//alert("dfdf");
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
	   });
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
                    $("span.patient_name").children('span').text(data);
                    $('input[type=text]#patientName').val('');
                    $('#myName').modal('hide');
                },
                error: function() 
	    	{
	    	} 	        
	   });
	}));
        $("#updateMobile").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "updateMobile.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    $("small.mobile").children('span').text(data);
                    $('input[type=text]#patientMobile').val('');
                    $('#myMobile').modal('hide');
                },
                error: function() 
	    	{
	    	} 	        
	   });
	}));
        $("#updateAddress").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "updateAddress.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    $("td.address").children('label').text(data);
                    $('textarea').val('');
                    $('#myAddress').modal('hide');
                },
                error: function() 
	    	{
	    	} 	        
	   });
	}));
        $("#updatePassword").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "updatePassword.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    alert('Password Updated...');
                    $("td.password").children('label').text(data);
                    $(':text#patientpassword').val('');
                    $('#myPassword').modal('hide');
                },
                error: function() 
	    	{
	    	} 	        
	   });
	}));
});

$( "span.patient_name" ).hover(
  function() {
    $( this ).children("a").css('opacity',"1");
  }, function() {
    $( this ).find( "a" ).css('opacity',"0");
  }
);
 $( "small.mobile" ).hover(
  function() {
    $( this ).children("a").css('opacity',"1");
  }, function() {
    $( this ).find( "a" ).css('opacity',"0");
  }
);

$( "td.address" ).hover(
  function() {
    $( this ).children("a").css('opacity',"1");
  }, function() {
    $( this ).find( "a" ).css('opacity',"0");
  }
);

$( "td.password" ).hover(
  function() {
    $( this ).children("a").css('opacity',"1");
  }, function() {
    $( this ).find( "a" ).css('opacity',"0");
  }
);
</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/moment.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
</body>

</html>
