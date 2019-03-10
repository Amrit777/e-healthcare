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
 
extract($_POST); 
if(isset($button))
{
	
	$pt_name=$_POST['pt_name'];
$typ_dis=$_POST['typ_dis'];
$doc_name=$_POST['doc_name'];
$whn_req=$_POST['whn_req'];
$cont_num=$_POST['cont_num'];
$blood_gp=$_POST['blood_gp'];
$quan=$_POST['quan'];
$req_city=$_POST['req_city'];
$cont_per_name=$_POST['cont_per_name'];
$hosp_add=$_POST['hosp_add'];
$date = date("Y-m-d H:i:s");
 

if ($pt_name==""  or $typ_dis=="" or $doc_name=="" or $whn_req=="" or $cont_num=="" or $blood_gp=="" or $quan=="" or $req_city=="" or $cont_per_name=="" or $hosp_add=="")
{
$err= "All fields must be entered, hit back button and re-enter information";
}




else{

$sql="INSERT INTO blood_req(pat_name,typ_dis,doc_name,whn_req,cont_num,blood_grp,quan,req_city,cont_per_name,hosp_add,dt)
VALUES
('$pt_name','$typ_dis','$doc_name','$whn_req','$cont_num','$blood_gp','$quan','$req_city','$cont_per_name','$hosp_add','$date')";
 mysqli_query($con,$sql);


 $err= "Your message has been received";
 }
}	
?>
        <div id="page-wrapper">

            <div class="container-fluid">
              <form id="form1" name="form1" method="post" action="">
  <table class="table table-bordered">
    <tr>
		<th style="color:green" colspan="4"><?php echo @$err; ?></th>
	</tr>
	<tr>
      <th class="cptn" colspan="4"><h3 class="text-primary">Request for Blood</h3></th>
      </tr>
    <tr>
      <td width="156" height="31" class="field">Patient's Name</td>
      <td width="32" class="field">:</td>
      <td colspan="2">
        <input type="text" name="pt_name" id="textfield" class="form-control" />      </td>
    </tr>
    <tr>
      <td class="field">Type of Disease</td>
      <td class="field">:</td>
      <td colspan="2">
        <input type="text" name="typ_dis" id="textfield2" class="form-control" />      </td>
    </tr>
    <tr>
      <td class="field">Doctor's Name</td>
      <td class="field">:</td>
      <td colspan="2">
        <input type="text" name="doc_name" id="textfield3"class="form-control" />      </td>
    </tr>
    
    <tr>
      <td class="field">When Required</td>
      <td class="field">:</td>
      <td width="144" colspan="2">
        <input type="date" name="whn_req" id="textfield4" class="form-control" />      </td>
    </tr>
    <tr>
      <td class="field">Contact Number</td>
      <td class="field">:</td>
      <td colspan="2">
        <input name="cont_num" type="text" id="textfield5" value="91" class="form-control"/>      </td>
    </tr>
    <tr>
      <td class="field">Blood Group</td>
      <td class="field">:</td>
      <td colspan="2"><span class="field">
        <select name="blood_gp" size="1" id="select" class="form-control">
          <option>- - Select - -</option>
          <option>A+</option>
          <option>A-</option>
          <option>B+</option>
          <option>B-</option>
          <option>AB+</option>
          <option>AB-</option>
          <option>O+</option>
          <option>O-</option>
        </select>
      </span></td>
    </tr>
    <tr>
      <td class="field">Quantity</td>
      <td class="field">:</td>
      <td colspan="2"><input type="text" name="quan" id="textfield7" class="form-control" /></td>
  
    </tr>
    <tr>
      <td class="field">City</td>
      <td class="field">:</td>
      <td colspan="2"><input type="text" name="req_city" id="textfield8" class="form-control" /></td>
    </tr>
    <tr>
      <td class="field">Contact Person Name</td>
      <td class="field">:</td>
      <td colspan="2">
        <input type="text" name="cont_per_name" id="textfield6" class="form-control" />      </td>
    </tr>
    <tr>
      <td height="97" class="field">Hospital Name/Address</td>
      <td class="field">:</td>
      <td colspan="2">
        <textarea name="hosp_add" id="textarea" cols="30" rows="5" class="form-control"></textarea>      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="4" align="center">
        <input type="submit" name="button" class="btn btn-success" id="button" value="Submit" />
		</td>
    </tr>
  </table>
  </form>  
            </div>
        </div>
<?php
                include './includes/footer.php';
?>