<?php
include './includes/header.php';    
	
        
    if(isset($_SESSION['user']) && !isset($_SESSION['donor']))
    {
	        header('location:../index.php');
	
    }
    
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
                            Profile : <?php echo $row['name'];?>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
            </div>
			<div class="container">
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<div class="panel-body">
              <form id="form1" name="form1" method="post" action="insert_donor_info.php">
  <table class="tbl_form" width="461" height="431" class="table table-bordered">
    <tr>
      <td colspan="4" class="cptn"><strong>Basic Informations</strong></td>
      </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
      </tr>
    <tr>
      <td class="field">Name</td>

      <td colspan="2">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="textfield" />      </td>
    </tr>
    <tr>
      <td class="field">Age</td>
      
      <td colspan="2"><input type="text" value="<?php echo $row['age']; ?>" class="form-control" name="age" id="textfield2" /></td>
    </tr>
    <tr>
      <td class="field">Gender</td>
      
      <td colspan="2"><select name="gn" class="form-control" id="select">
        <option>--Select--</option>
        <option <?php if($row['gender']=="male"){echo "selected";} ?>>Male</option>
        <option <?php if($row['gender']=="Female"){echo "selected";} ?>>Female</option>
        </select>        </td>
    </tr>
            <tr>
      <td class="field">Blood Group</td>
      <td class="field">&nbsp;</td>
      <td colspan="2"><select name="bg" size="1" id="select" class="form-control">
          <option>- - Select - -</option>
          <option <?php if($row['b_gp']=="A+"){echo "selected";} ?>>A+</option>
          <option <?php if($row['b_gp']=="A-"){echo "selected";} ?>>A-</option>
          <option <?php if($row['b_gp']=="B+"){echo "selected";} ?>>B+</option>
          <option <?php if($row['b_gp']=="B-"){echo "selected";} ?>>B-</option>
          <option <?php if($row['b_gp']=="AB+"){echo "selected";} ?>>AB+</option>
          <option <?php if($row['b_gp']=="AB-"){echo "selected";} ?>>AB-</option>
          <option <?php if($row['b_gp']=="O+"){echo "selected";} ?>>O+</option>
          <option <?php if($row['b_gp']=="O-"){echo "selected";} ?>>O-</option>
        </select></td>
    </tr>
    <tr>
      <td colspan="4" class="field">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="4" class="cptn"><strong>Contact Informations</strong></td>
      </tr>
    <tr>
      <td colspan="4" class="field">&nbsp;</td>
      </tr>
          <tr>
      <td class="field">Country</td>
  
      <td colspan="2"><input type="text" class="form-control" value="<?php echo $row['city']; ?>" name="city" id="textfield3" /></td>
    </tr>
    <tr>
      <td class="field">State</td>
    
      <td colspan="2"><input type="text" value="<?php echo $row['state']; ?>" class="form-control" name="state" id="textfield4" /></td>
    </tr>
   <tr>
      <td class="field">Mobile Number</td>
  
      <td colspan="2">
        <input name="mob_num" type="text" class="form-control" value="<?php echo $row['mob_num']; ?>" id="textfield5" value="+91" />      </td>
    </tr>
        <tr>
      <td class="cptn" colspan="4"><strong>Login Informations</strong> </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
      </tr>
       <tr>
      <td class="field">E-mail ID</td>
     
      <td colspan="2">
        <input type="text" class="form-control" value="<?php echo $row['e_mail']; ?>" name="email" id="textfield6" />      </td>
    </tr>
   
    <tr>
      <td class="field">Password</td>
      
      <td colspan="2">
        <input type="text" value="<?php echo $row['pass']; ?>" name="pass" id="textfield2" class="form-control" />      </td>
      
    </tr>
    <tr>
      <td class="field">Confirm Password</td>
      <td colspan="2">
        <input type="text" name="cpass" value="<?php echo $row['pass']; ?>" id="textfield3" class="form-control" />      </td>
    </tr>
   
    <!--<tr>
      <td height="97" class="field">Message</td>
      <td class="field">:</td>
      <td colspan="2">
        <textarea name="msg" class="form-control" id="textarea" cols="30" rows="5">
		/*<?php echo $row['msg']; ?>*/
		</textarea>      </td>
    </tr>-->
   
  </table>
  </form> 
                </div>
					</div>
				</div>
			</div>
            
            
           
        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/moment.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
</body>

</html>
