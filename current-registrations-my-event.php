<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['loggedin']==1 && $_SESSION['usertype']=='internal'&& $_SESSION['userdesignation']=='EVENT-COORDINATOR')
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
                <meta http-equiv=”Pragma” content=”no-cache”>
                <meta http-equiv=”Expires” content=”-1″>
                <meta http-equiv=”CACHE-CONTROL” content=”NO-CACHE”>
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
<div class="introcontent" style="width:100%;">
<div class="head" style="background-color: white;">
Welcome <strong><?php echo $_SESSION['username'];  ?></strong> | <span class="label label-success"><?php echo $_SESSION['userdesignation']; ?></span> | REG. NO : <strong><?php echo $_SESSION['internalregnumber'] .' | '; ?></strong><?php if($_SESSION['usertype']=='internal'){echo'<a class="menu" href="my-user-profile.php"><button style="height:33px;" type="button" class="btn btn-danger btn-xs">GO BACK</button></a>';} elseif($_SESSION['usertype']=='external') {echo'<a class="menu" href="user-profile.php"><button style="height:33px;" type="button" class="btn btn-danger btn-xs">GO BACK</button></a>';} ?> | <a href="logout.php"><button style="height:33px;" type="button" class="btn btn-warning btn-xs">LOGOUT</button></a>
</div>
<br>
<div style="background-color:#ACC3E5;">
<?php
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
	$studentid=$_SESSION['studentid'];
$sql1="SELECT id,eventname FROM eventdetails WHERE userid1='$studentid' OR userid2='$studentid' OR userid3='$studentid'";
$query1=mysqli_query($connect,$sql1);
if(mysqli_num_rows($query1)>0)
 {
 	while($row1=mysqli_fetch_assoc($query1))
 	{
    $myeventname=$row1['eventname'];
    $eventid=$row1['id'];
    echo 'You are hosting '.$row1['eventname'].'<br>';
    echo 'EVENT ID : '.$eventid;
echo'<br>';
    
 	}
 }
 else{
 	die('You are hosting  NO events in INNOVATE 2k17');
 }
}
mysqli_close($connect);
?>
<?php
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
$count=1;
$sql0="SELECT * FROM  eventregistrations WHERE eventid='$eventid'&& eventname='$myeventname'";
$query0=mysqli_query($connect,$sql0);
if(mysqli_num_rows($query0)>0)
{
while($myrow=mysqli_fetch_assoc($query0))
{
$count++;
}
echo 'REGISTRATION COUNT [INTERNAL+EXTERNAL] IS <a style="color:red;font-weight:bold;">'.$count.'</a>';
echo '</div>';
}
else{
echo 'REGISTRATION COUNT [INTERNAL+EXTERNAL] IS 0';
echo '</div>';
}
$pagenumbers=(int)ceil($count/10);
echo '<br>';
echo'<h4><i>MOVE TO PAGE : </i></h4>';
echo '<form action="pagenumbervalidate.php" method="post">';
echo'<select name="page">';
for($i=1;$i<=$pagenumbers;$i++)
{
echo'<option value="'.$i.'">'.$i.'</option>';
}
echo'</select>';
echo '<input type="submit">';
echo '</form>';
if(isset($_SESSION['pagenumber']))
{

$newi=$_SESSION['pagenumber'];
if($newi==1){$newi=0;}
else{
$myi=$_SESSION['pagenumber']-1;
$newi=$myi*10;
}
}
else
{
$newi=0;
$_SESSION['pagenumber']=1;
}
echo'<hr style="width:40%;">';
echo '<div style="border-color:red;border-width:1px;border-style:solid;border-radius:6px;width:30%;"><h4><i>Current Page Number : </b>'.$_SESSION['pagenumber'].'</b></i></h4></div>';
echo '<br>';
$sql1="SELECT * FROM eventregistrations WHERE eventid='$eventid' && eventname='$myeventname' LIMIT 10 OFFSET ".$newi;
$query1=mysqli_query($connect,$sql1);
if(mysqli_num_rows($query1)>0)
{
while($newrow=mysqli_fetch_assoc($query1))
{
$status=$newrow['regamount'];
if($status==0)
{
$mystatus='<a style="color:red;font-weight:bold;">UNPAID</a>';
}
elseif($status==1)
{
$mystatus='<a style="color:green;font-weight:bold;">PAID</a>';
}
echo '<div style="background-color:#FFF4B9;">';
echo '<i>Event Registration ID : </i><span class="badge">'.$newrow['registrationid'].'</span><br>';
echo 'REGISTRATION AMOUNT : '.$mystatus.'<br>';
	echo 'PARTICIPANT NAME : '.$newrow['participantname'].' | PARTICIPANT TYPE : <b>'.$newrow['participanttype'].'</b> <br> PARTICIPANT CONTACT : <u>'.$newrow['participantcontact'].'</u> | PARTICIPANT REG. NUMBER : '.$newrow['participantregno'].'<br>PARTICIPANT DEPARTMENT : '.$newrow['participantdept'].' | YEAR : '.$newrow['participantyear'];
echo'</div>';
	echo'<br>';
}
}
else{
	echo 'There are currently no registrations for the event you are hosting';
}
}
mysqli_close($connect);

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