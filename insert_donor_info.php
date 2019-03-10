<?php 
include("includes/config.php");
error_reporting(1);

$name=$_POST['name'];
$pass=$_POST['pass'];
$age=$_POST['age'];
$gn=$_POST['gn'];
$bg=$_POST['bg'];
$state=$_POST['state'];
$city=$_POST['city'];
$mob_num=$_POST['mob_num'];
$email=$_POST['email'];

 $usercheck = $email;

 $check = mysqli_query($con,"SELECT email FROM member_reg WHERE email = '$usercheck'") ;

 $check2 = mysqli_num_rows($check);


if ($pass=="" or $name=="" or $email=="" or $bg=="")
{
echo "All fields must be entered, hit back button and re-enter information";
}
elseif ($check2 != 0) {

 		die('Sorry, the email '.$_POST['email'].' is already in use');

 				}

elseif($_POST['pass'] != $_POST['cpass']) {

 		die('Your passwords did not match. ');

 	}

else{

$sql="INSERT INTO donor_reg (pass,name,age,gender,b_gp,state,city,mob_num,e_mail)
VALUES
('$pass','$name','$age','$gn','$bg','$state','$city','$mob_num','$email')";
 mysqli_query($con,$sql) or die(mysqli_error());

 echo "Succesfully Registered!!!!!";
 header( 'Location: donor_login.php' ) ;

 }
?>
