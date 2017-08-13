<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>INNOVATE 2K17</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="boot/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="boot/bootstrap.min.css">
<link rel="stylesheet" href="boot/bootstrap-theme.min.css">
<style>
@font-face {
    font-family: head;
    src: url(Pompiere-Regular.ttf);
}

@font-face {
    font-family: tail;
    src: url(JustAnotherHand.ttf);
}
@font-face {
    font-family: tahe;
    src: url(GreatVibes-Regular.ttf);
}
div.introcontent{
	background-color: #ffffff;
	opacity: 0.7;
	border-radius: 12px;
	color:black;
	font-family: head;
	font-size:24px;
}
div.modal-content{
font-family: head;
background-color: #ffffff;
opacity:0.9;
width:85%;
margin:auto;
font-size:22px;
}
div.modal-body{
	background-color:#484750 ;
	color:white;
}
a.heading{
	text-decoration: none;
	color: #353539;
	font-size: 24px;
}
a{
	cursor:crosshair;
}
div.content{
	color:black;
	font-family: head;
	font-size: 24px;
}
div.features{
	font-family: head;
	font-size: 20px;
}
body{
	background-image:url('images/normalback.png');
	background-repeat: repeat x y;
}
input[type=email]{
	background-color:#C0C0C0;
	color:black;
	font-size:22px;
}
input[type=password],input[type=submit]{
	background-color:#C0C0C0;
	color:black;
	font-size:22px;
}
input[type=number]{
	background-color:#C0C0C0;
	color:black;
	font-size:26px;
}
input[type=text]{
	background-color:#C0C0C0;
	color:black;
	font-size:22px;
}
input[type=submit]:hover{
	background-color:black;
}
.btn-static {
	font-size: 26px;
  background-color: white;
  border: 1px solid lightgrey;
  cursor: default;
}
.btn-static:active {
  -moz-box-shadow:    inset 0 0 0px white;
  -webkit-box-shadow: inset 0 0 0px white;
  box-shadow:         inset 0 0 0px white;
}
</style>
</head>
<body>
<center><a href="index.php">
<img src="images/logo.png"></img></a>
<div class="introcontent" style="width:60%;">
<h2>INTERNAL REGISTRATIONS</h2>
<hr>
<?php
$fn=$_POST['first-name'];
$ln=$_POST['last-name'];
$id=$_POST['email-id'];
$password=$_POST['user-password'];
$regno=$_POST['regnumber'];
$dept=$_POST['mydept'];
$year=$_POST['year'];
$hostype=$_POST['hosttype'];
$contact=$_POST['contact'];
if(strlen($regno)==15)
{
  } 
else
{
	$_SESSION['errmsg']='The registration number your entered seems invalid. Please try again. If your registration nunbr is correct , please contact the webadmin at +91-8091403027 / +91-8171633012';
	header('Location:internal-participant-registration.php');
}
if($hostype==1)
{
	$type='dayscholar';
}
else
{
	$type='hosteller';
}
$server="localhost";
$user="techzon2";
$pass="RwIKlQ#nQ";
$db="techzon2_innovateaccounts";
$connect=mysqli_connect($server,$user,$pass,$db);
if(!$connect)
{
	die('SERVER ERROR. COME BACK LATER.'.mysqli_connect_error());
}
else
{
$sql="SELECT * FROM internalparticipants WHERE emailid='$id'";
$query=mysqli_query($connect,$sql);
if(mysqli_num_rows($query)>0)
 { 
 echo'<h2>This email-id already exists in our database. Please proceed to LOGIN. </h2>';
 }
 else
 {
    $hash = md5( rand(0,1000) );
 	$newsql="INSERT INTO internalparticipants(firstname,lastname,designation,emailid,password,regnumber,department,year,contact,hash,active) VALUES ('$fn','$ln','PARTICIPANT','$id','$password','$regno','$dept','$year','$contact','$hash','1') ";
 	$lastquery=mysqli_query($connect,$newsql);
$to      = $id; // Send email to our user
$subject = 'Your account needs verification'; // Give the email a subject 
$message = '
 
Thanks for registering yourself for INNOVATE 2k17 !
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$id.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://www.innovate2k17.com/internalverify.php?email='.$ei.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@innovate2k17.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
 	if($lastquery==1)
 	{
 echo'<h2>Your account has been made, <br> You can register for specific events you are interested in from your account.<br><hr>
 You can access your ticket number from your account.<br> <strong>Proceed to<a href="index.php">LOGIN</a></strong> ';}
 else{
 	echo 'There was some error connecting to the database. Please try again later.';
 }
 }
}
mysqli_close($connect);
?>
<?php
   $server="localhost";
   $user="techzon2";
   $pass="RwIKlQ#nQ";
   $db="techzon2_innovateaccounts";
   $nconnect=mysqli_connect($server,$user,$pass,$db);
   if(!$nconnect)
   {
	die('SERVER ERROR. COME BACK LATER.'.mysqli_connect_error());
   }
   else
   {
    $mysql="SELECT id FROM internalparticipants WHERE regnumber='$regno'";
    $myquery=mysqli_query($nconnect,$mysql);
    if(mysqli_num_rows($myquery)>0)
    {
    	while($myrow=mysqli_fetch_assoc($myquery))
    	{
    		$studentid=$myrow['id'];
    		echo "Please note your USER-ID/STUDENT-ID for further reference : ".$studentid;
    	}
    }
   }
mysqli_close($nconnect);
?>
<?php
   $server="localhost";
   $user="techzon2";
   $pass="RwIKlQ#nQ";
   $db="techzon2_innovateevents";
   $mconnect=mysqli_connect($server,$user,$pass,$db);
   if(!$mconnect)
   {
	die('SERVER ERROR. COME BACK LATER.'.mysqli_connect_error());
   }
   else
   {
    $mysql1="INSERT INTO studentdetails(regnumber,userid,firstname,lastname,contact,emailid) VALUES ('$regno','$studentid','$fn','$ln','$contact','$id')";
    $myquery1=mysqli_query($mconnect,$mysql1);
    if($myquery1==1)
    {
     echo '<p style="color:red;">NOTE : Unlocked your account portal. You can now register for the events</p>';
    }
    else{
  echo '<p style="color:red;">NOTE : There was some technical error. Please mail the screenshot at administrator@innovate2k17.com</p>';
    }
   }
mysqli_close($mconnect);
?>
</div>
<script src="boot/jquery-1.11.3.min.js"></script>
<script src="boot/bootstrap.min.js"></script>
</center>
</body>
</html>