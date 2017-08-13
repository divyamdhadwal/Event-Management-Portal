<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['loggedin']==1 && ($_SESSION['userdesignation']=='EXECUTIVE' || $_SESSION['userdesignation']=='GENERAL CHAIRPERSON' || $_SESSION['userdesignation']=='FACULTY'))
{

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
</style>
</head>
<body>
<center><a href="index.php"><img src="images/logo.png"></img></a>
<div class="introcontent" style="width:80%;">
Welcome <strong><?php echo $_SESSION['username'];  ?></strong> | REG. NO : <strong><?php echo $_SESSION['internalregnumber'];  ?></strong> | DESIGNATION : <span class="label label-danger"><?php echo $_SESSION['userdesignation']; ?></span> <br> <?php if($_SESSION['usertype']=='internal'){echo'<a class="menu" href="my-user-profile.php">GO BACK</a>';} elseif($_SESSION['usertype']=='external') {echo'<a class="menu" href="user-profile.php">GO BACK</a>';} ?> | <a class="menu" href="logout.php">LOGOUT</a>
<hr>
<?php
$eventid=$_POST['eventtrack'];
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
$sqla="SELECT COUNT(*) as fcount FROM eventregistrations WHERE eventid='$eventid' && regamount='1'";
$querya=mysqli_query($connect,$sqla);
if(mysqli_num_rows($querya)>0)
{
while($rowa=mysqli_fetch_assoc($querya))
{
$finalpaidcount=$rowa['fcount'];
}
}
	$sql0="SELECT eventname FROM eventdetails WHERE id='$eventid'";
	$query0=mysqli_query($connect,$sql0);
	if(mysqli_num_rows($query0)>0)
	{
		while($row0=mysqli_fetch_assoc($query0))
		{
			$eventname=$row0['eventname'];
		}
	}
$sql1="SELECT COUNT(*) as total FROM eventregistrations WHERE eventid='$eventid'";
$query1=mysqli_query($connect,$sql1);
  if(mysqli_num_rows($query1)>0)
  {
   while($row=mysqli_fetch_assoc($query1))
   {

     $result=$row['total'];
     echo '<h3>TOTAL NUMBER OF REGISTRATIONS FOR <b>'.$eventname.'</b> : <b>'.$result.'</b></h3><br>';
echo '<h3>TOTAL NUMBER OF PAID REGISTRATIONS : <b> '.$finalpaidcount.'</b></h3><br>';
$notpaid=$result-$finalpaidcount;
echo '<h3>TOTAL NUMBER OF UNPAID REGISTRATIONS : <b>'.$notpaid.'</b></h3><br>';
   }
  }
  else{
  	echo 'ERROR';
  }
}
mysqli_close($connect);
?>
<?php
$server="localhost";
$user="techzon2";
$pass="RwIKlQ#nQ";
$db="techzon2_innovateevents";
$mconnect=mysqli_connect($server,$user,$pass,$db);
if(!$mconnect)
{
	die('Error connecting to the database at the time'.mysqli_connect_error());
}
else{
	$newcount=1;
$sql2="SELECT * FROM eventregistrations WHERE eventid='$eventid'";
$query2=mysqli_query($mconnect,$sql2);
 if(mysqli_num_rows($query2)>0)
  {
   while($row2=mysqli_fetch_assoc($query2))
   {
   	 echo '<h3><b>'.$newcount.'</b></h3>&nbsp;';
echo '<br>';
if($row2['regamount']==1)
{
$status='<a style="color:green;">PAID</a>';
}
elseif($row2['regamount']==0)
{
$status='<a style="color:red;">UNPAID</a>';
}
echo 'REGISTRATION STATUS : '.$status.'<br>';
      echo '[PARTICIPANT NAME :<b>'.$row2['participantname'].'</b>] [PARTICIPANT TYPE : <b>'.$row2['participanttype'].'('.$row2['participantyear'].'year)</b>]<br>';
      echo 'EPARTICIPANT REG. NO :<b>'.$row2['participantregno'].'</b>&nbsp;&nbsp;&nbsp;&nbsp;'.'CONTACT :<a style="color:red;">'.$row2['participantcontact'].'</a><br>';
      $newcount++;
      echo '<hr>';
   }
  }
  else
  {
  	echo 'There are no registrations for '.$eventname;
  }
}
mysqli_close($mconnect);
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