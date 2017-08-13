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
<h2>EXTERNAL REGISTRATIONS</h2>
<hr>
<?php
$fn=$_POST['first-name'];
$ln=$_POST['last-name'];
$ei=$_POST['email-id'];
$up=$_POST['user-password'];
$in=$_POST['institute-name'];
$ntm=$_POST['num-team-members'];
$natm=$_POST['name-team-members'];
$c=$_POST['contact'];
$ac=$_POST['alternative-contact'];

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
$sql="SELECT * FROM externalparticipants WHERE emailid=$ei";
$query=mysqli_query($connect,$sql);
if(mysqli_num_rows($query)>0)
 { 
 echo'<h2>This email-id already exists in our database. Please proceed to LOGIN. </h2>';
 }
 else
 {
 	
    $hash = md5( rand(0,1000) );
 	$newsql="INSERT INTO externalparticipants(firstname,lastname,designation,emailid,password,institutename,numteammembers,nameteammembers,contact,alternativecontact,hash,active) VALUES ('$fn','$ln','PARTICIPANT','$ei','$up','$in','$ntm','$natm','$c','$ac','$hash','1') ";
 	$lastquery=mysqli_query($connect,$newsql);
$to      = $ei; // Send email to our user
$subject = 'Your account needs verification'; // Give the email a subject 
$message = '
 
Thanks for registering yourself for INNOVATE 2k17 !
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$ei.'
Password: '.$up.'
------------------------
 
Please click this link to activate your account:
http://www.innovate2k17.com/verify.php?email='.$ei.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@innovate2k17.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
 	if($lastquery==1)
 	{
 		
 echo'<h2>Your account has been made, <br> You can register for specific events you are interested in from your account.<br><hr>';
echo 'Please login , once logged in you can check all the event details (coordinators , place , date, faculty coordinators, prize money)';
echo ' You can register for the events you are interested in from your account portal. Registration amount for each event is already mentioned and must be payed at the time of visit';}
 else{
 	echo 'There was some error connecting to the database. Please try again later.';
 }
 }
}
mysqli_close($connect);
?>
</div>
<script src="boot/jquery-1.11.3.min.js"></script>
<script src="boot/bootstrap.min.js"></script>
</center>
</body>
</html>