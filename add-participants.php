<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['loggedin']==1 && $_SESSION['usertype']=='internal' && $_SESSION['userdesignation']=='EVENT-COORDINATOR' )
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
a.button{
border-color:black;
border-width:2px;
border-radius:6px;
border-style:solid;
font-size:30px;
background-color:#E9F2F4;
text-decoration:none;
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
Welcome <strong><?php echo $_SESSION['username'];  ?></strong> | <span class="label label-success"><?php echo $_SESSION['userdesignation']; ?></span> | REG. ID : <strong><?php echo $_SESSION['studentid'] .' | '; ?></strong><?php if($_SESSION['usertype']=='internal'){echo'<a class="menu" href="my-user-profile.php"><button style="height:33px;" type="button" class="btn btn-danger btn-xs">GO BACK</button></a>';} elseif($_SESSION['usertype']=='external') {echo'<a class="menu" href="user-profile.php"><button style="height:33px;" type="button" class="btn btn-danger btn-xs">GO BACK</button></a>';} ?> | <a href="logout.php"><button style="height:33px;" type="button" class="btn btn-warning btn-xs">LOGOUT</button></a>
</div>
<hr>
<h4>EVENT HAS BEEN STARTED</h4>
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
	$studentid=$_SESSION['studentid'];
$sql1="SELECT * FROM eventdetails WHERE userid1='$studentid' OR userid2='$studentid' OR userid3='$studentid'";
$query1=mysqli_query($connect,$sql1);
if(mysqli_num_rows($query1)>0)
 {
 	while($row1=mysqli_fetch_assoc($query1))
 	{
$myeventid=$row1['id'];
        echo '<h3>EVENT NAME : <b><a style="color:green;">'.$row1['eventname'].'</a></b>&nbsp;&nbsp;&nbsp;EVENT ID : <b><a style="color:green;">'.$row1['id'].'</a></b></h3>';
        }
}
}
mysqli_close($connect);
?>
<br>
<?php
$server="localhost";
$user="techzon2";
$pass="RwIKlQ#nQ";
$db="techzon2_innovateevents";
$connectm=mysqli_connect($server,$user,$pass,$db);
if(!$connectm)
{
	die('Error connecting to the database at the time'.mysqli_connect_error());
}
else{
$myevent='eventid'.$myeventid;
$sql1="SELECT * FROM $myevent";
$query2=mysqli_query($connectm,$sql1);
if(mysqli_num_rows($query2)>0)
 {
 	while($row2=mysqli_fetch_assoc($query2))
 	{
if($row2['regamount']==1)
{
$status='<a style="color:green;">PAID</a>';
}
elseif($row2['regamount']==0)
{
$status='<a style="color:red;">UNPAID</a>';
}
echo 'EVENT REGISTRATION ID : <span class="badge">'.eventregid.'</span><br>';
        echo 'NAME : '.$row2['participantname'].'&nbsp;&nbsp;REG NO : '.$row2['participantregno'].'&nbsp;&nbsp;YEAR : '.$row2['participantyear'].'&nbsp;&nbsp;BRANCH : '.$row2['participantbranch'].'&nbsp;&nbsp;STATUS : '.$status;
        }
 }
else{
echo '<h3>There are currently no participants which you have added.</h3>';
echo'<br>
<h2>ADD NOW</h2>
<div style="background-color:#2FAEBD;width:60%;">
NOTE : Please prefer event registration ID for external participants. A participant can access his event registration ID by checking "My Registration Details" in his profile.<br>
<form action="add-by-reg-no.php" method="post"><h4>Participant College Registration number :</h4><input type="text" name="parregno"><input type="submit"></form><br>
OR
<form action="add-by-red-id.php" method="post"><h4>Participant Event Registration ID : </h4><input type="text" name="parregid"><input type="submit"></form><br>
</div>';
}
}
mysqli_close($connectm);
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