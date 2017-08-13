<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['loggedin']==1 && ($_SESSION['usertype']=='internal' || $_SESSION['usertype']=='external' ))
{
$_SESSION['idforreg']=$_POST['eventidforreg'];

if($_SESSION['idforreg']==20 && $_SESSION['dcounter']==0)
{

header('Location:igniteregistration.php');
die('Redirecting');

}
}
else
{
	header('Location:index.php');
}
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
width:auto;
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
	background-color:;
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
a.menu{
	text-decoration: none;
	color:black;
	font-weight: bold;
}
a.menu:hover{
	color:blue;
}
</style>
</head>
<body>
<center><a href="index.php"><img src="images/logo.png"></img></a>
<div class="introcontent" style="width:80%;">
Welcome <strong><?php echo $_SESSION['username'];  ?></strong> | REG. ID : <strong><?php echo $_SESSION['studentid'];  ?></strong> | DESIGNATION : <span class="label label-danger"><?php echo $_SESSION['userdesignation']; ?></span> <br> <?php if($_SESSION['usertype']=='internal'){echo'<a class="menu" href="my-user-profile.php">GO BACK</a>';} elseif($_SESSION['usertype']=='external') {echo'<a class="menu" href="user-profile.php">GO BACK</a>';} ?> | <a class="menu" href="logout.php">LOGOUT</a>
<hr>
<h2>REGISTRATION FOR EVENT @ INNOVATE 2k17</h2>
<hr>
<?php

	$pname=$_SESSION['username'];
	
$forreg=$_SESSION['idforreg'];
    $server="localhost";
    $user="techzon2";
    $pass="RwIKlQ#nQ";
    $db="techzon2_innovateevents";
    $connect=mysqli_connect($server,$user,$pass,$db);
    if(!$connect)
    {
	die('Error connecting to the database at the time'.mysqli_connect_error());
    }
    else{

     $sql1="SELECT eventname FROM eventdetails WHERE id='$forreg'";
     $query1=mysqli_query($connect,$sql1);
     if(mysqli_num_rows($query1)>0)
     {
       while($row1=mysqli_fetch_assoc($query1))
       {
       	$eventname=$row1['eventname'];
       }
     }
     else{

     	die("There is no event which matches the EVENT ID you entered. Please check QUICK EVENT DETAILS to check event id of an event. Please fill in the correct ID and try again. <br><b>NOTE :</b>If you are registering for IGNITE 5.0 , ignore the message. We have received your registration details. ");
     }
    }
mysqli_close($connect);
?>
<?php
if($_SESSION['usertype']=='internal')
{
	$pname=$_SESSION['username'];
	$forreg=$_SESSION['idforreg'];
$usertype=$_SESSION['usertype'];
$regn=$_SESSION['internalregnumber'];
$userdept=$_SESSION['userdept'];
$usergrade=$_SESSION['usergrade'];
$contact=$_SESSION['usercontact'];
    $server="localhost";
    $user="techzon2";
    $pass="RwIKlQ#nQ";
    $db="techzon2_innovateevents";
    $connect=mysqli_connect($server,$user,$pass,$db);
    if(!$connect)
    {
	die('Error connecting to the database at the time'.mysqli_connect_error());
    }
    else{
    	function generateRandomString($length = 10) 
    	{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $uid = '';
    for ($i = 0; $i < $length; $i++) {
        $uid .= $characters[rand(0, $charactersLength - 1)];
        $_SESSION['uid']=$uid;
    }
    }
    echo generateRandomString();
    $myuid=$_SESSION['uid'];
$sqla="INSERT INTO eventregistrations (eventid,eventname,participantname,participantyear,participantdept,participanttype,participantregno,participantcontact,UID) VALUES ('$forreg','$eventname','$pname','$usergrade','$userdept','$usertype','$regn','$contact','$myuid')";
$querya=mysqli_query($connect,$sqla);
if($querya==1)
{

echo 'We successfully registered you for <b>'.$eventname.'</b> with the following information :<br>';
echo 'TYPE :'.$usertype.'<br>';
echo 'DEPARTMENT :'.$_SESSION['userdept'].'<br>';
echo 'CONTACT :'.$contact.'<br>';
echo '<a style="color:red;">NOTE : To change any information , please meet Divyam Dhadwal @ innovatehub or you can mail the changes at administrator@innovate2k17.com<br></a>';
echo 'Your UNIQUE INDENTIFICATION ID is : '.$_SESSION['uid'].' (Please note this UID for further reference)';
echo 'Deposit registration amount. See <a href="registration-notice.php">NOTICE </a>. Once you have paid the amount , make sure that event registration amount in "My registration Details" changes from UNPAID to PAID ';
}
else{
	echo 'There was some error while registering you for your interested event. Please try again later. If error persists , please contact DIVYAM DHADWAL (+91-8171633012)';
}
}
}
elseif($_SESSION['usertype']=='external')
{
	$extname=$_SESSION['username'];
	$forreg=$_SESSION['idforreg'];
	$usertype=$_SESSION['usertype'];
	$regn='N.A.';
$userdept='N.A.';
$usergrade='N.A.';
$contact=$_SESSION['usercontact'];
$server="localhost";
    $user="techzon2";
    $pass="RwIKlQ#nQ";
    $db="techzon2_innovateevents";
    $connect=mysqli_connect($server,$user,$pass,$db);
    if(!$connect)
    {
	die('Error connecting to the database at the time'.mysqli_connect_error());
    }
    else{
    	function generateRandomString($length = 10) 
    	{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $uid = '';
    for ($i = 0; $i < $length; $i++) {
        $uid .= $characters[rand(0, $charactersLength - 1)];
        $_SESSION['uid']=$uid;
    }
    }
    echo generateRandomString();
    $myuid=$_SESSION['uid'];
$sid=$_SESSION['studentid'];
$sqla="INSERT INTO eventregistrations (eventid,eventname,participantname,participantyear,participantdept,participanttype,participantregno,participantcontact,UID) VALUES ('$forreg','$eventname','$extname','$usergrade','$userdept','$usertype','$sid','$contact','$myuid')";
$querya=mysqli_query($connect,$sqla);
if($querya==1)
{

echo 'We successfully registered you for <b>'.$eventname.'</b> with the following information :<br>';
echo 'TYPE :'.$usertype.'<br>';
echo 'DEPARTMENT :'.$_SESSION['userdept'].'<br>';
echo 'CONTACT :'.$contact.'<br>';
echo '<a style="color:red;">NOTE : To change any information , please meet Divyam Dhadwal @ innovatehub or you can mail the changes at administrator@innovate2k17.com<br></a>';
echo 'Your UNIQUE INDENTIFICATION ID is : '.$_SESSION['uid'].' (Please note this UID for further reference)';

}
}
}
?>
</div>
<hr style="width:60%;">
<p style="color:black; font-family: head; font-size: 16px;">DESIGNED by : DIVYAM DHADWAL<br>
                         Copyright &#169; 2017 INNOVATE - SRM University NCR Campus. All Rights Reserved.<br>
                         Best viewed in IE 10.x, Firefox 25.x, Chrome 30.x onwards with a Resolution of 1024 * 768 & above</p>
</center>
<script src="boot/jquery-1.11.3.min.js"></script>
<script src="boot/bootstrap.min.js"></script>

</body>
</html>