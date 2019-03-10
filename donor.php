<?php
 session_start();
 include_once './includes/config.php';?>

 <?php include('includes/header.php'); ?>
 

 <html>

 <head>
 <link rel="stylesheet" type="text/css" href="css/loginstye.css">
 <link rel="stylesheet" type="text/css" href="css/donorreg.css">
 </head>


<body>
  <!-- Responsive-->
  <div class="col-sm-6 col-sm-offset-3 col-md-6 col-lg-8 col-lg-offset-2 col-md-offset-4">
  <!--cntainer-->
    <div style="height:580px; width:700px; margin:auto; margin-top:10px; margin-bottom:10px; box-shadow:16px 1px 10px gray;">
    <!--heading-->
     <div class="panel-heading">
              <h3 class="text-center">Donor Registration</h3>
        </div>
        <!--container-->
       <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">
              <form id="form1" name="form1" method="post" action="insert_donor_info.php">
            <table cellpadding="0" cellspacing="0px" style="margin:auto; width:100%; " >
              <tr>
      <td class="lefttd"><h4><strong>Basic Informations</strong></h4></td>
      </tr>
	<tr>
		<td class="lefttd">Donor Name</td>
		<td><input type="text" name="name" id="textfield" class="form-control" required="required" pattern="[a-zA-Z _]{3,15}" title="please enter only character between 3 to 15 for donor name" /></td>
	</tr>
	
	<tr>
		<td class="lefttd">Gender</td>
		<td><input name="gn" type="radio" value="male" checked="checked"><i class="fa fa-male"></i>
    <span style="margin: 0 20px 0 20px"></span>
		<input name="gn" type="radio" value="female" ><i class="fa fa-female"></i></td>
	</tr>
	
	<tr>
		<td class="lefttd">Age</td><td><input type="number" id="textfield2" name="age" required="required" pattern="[0-9]{2}" title="please enter only two digit numbers for age" />
		</td>
	</tr>
	<tr>
      <td class="lefttd">Blood Group</td>
      <td><select name="bg" size="1" id="select" class="form-control">
          <option>- - Select - -</option>
          <option>A+</option>
          <option>A-</option>
          <option>B+</option>
          <option>B-</option>
          <option>AB+</option>
          <option>AB-</option>
          <option>O+</option>
          <option>O-</option>
        </select></td>
    </tr>
    <tr>
    <td><script type= "text/javascript" src = "js/countries.js"></script>Select Country</td>
      <td><select id="textfield3" class="form-control" name ="city" class="dropdown-toggle" required></select></td>
      </tr>
  <tr>
  <td>
  Select State</td><td> <select name ="state" class="form-control" id ="textfield4" class="dropdown" required></select>
</td></tr>

<script language="javascript">
  populateCountries("country", "state");
</script>
	<!--<tr>
      <td class="lefttd">State</td>
	  <td><input type="text" class="form-control" name="state" id="textfield13" required="required" /></td>
	  </tr>
	  <tr>
      <td class="lefttd">City</td>
	  <td><input type="text" class="form-control" name="city" id="textfield14" required="required" /></td>
    </tr>-->
	<tr>
      <td class="lefttd">Mobile Number</td>
	  <td><input type="text" name="mob_num" class="form-control" id="textfield5" value="+91" required="required" pattern="[+][0-9]{12}" title="please enter correct mobile no." /></td>
	</tr>
	
	<tr>
      <td class="lefttd"><h4><strong>Login Informations</strong></h4></td>
    </tr>
	
    <tr>
      <td class="lefttd">E-mail ID</td>
	  <td><input type="text" class="form-control" name="email" id="textfield6" required="required" placeholder="xyz@gmail.com" /></td>
    </tr>
	
	<tr>
      <td class="lefttd">Password</td>
      <td><input type="password" class="form-control" name="pass" id="textfield2" required="required" placeholder="Min 8 Character" pattern="[a-zA-Z0-9]{8,16}" title="please enter only character or numbers" /></td>
	</tr>
	
    <tr>
      <td class="lefttd">Confirm Password</td>
      <td><input type="password" class="form-control" name="cpass" id="textfield3" required="required" placeholder="Min 8 Character" pattern="[a-zA-Z0-9]{8,16}" title="please enter only character or numbers" /></td>
    </tr>
    <tr>
	<td>&nbsp;</td>	
	<td><input type="submit" name="button" class="btn btn-primary" id="button" value="Create Account" /></td>
    </tr>
  </table>
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
   
    </body>
</html>

