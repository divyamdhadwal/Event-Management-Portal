<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['loggedin']==1 && $_SESSION['usertype']=='internal')
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
<div class="introcontent" style="width:100%;">
<div class="head" style="background-color: white;">
Welcome <strong><?php echo $_SESSION['username'];  ?></strong> | <span class="label label-success"><?php echo $_SESSION['userdesignation']; ?></span> | REG. NO : <strong><?php echo $_SESSION['internalregnumber'] .' | '; ?></strong><?php if($_SESSION['usertype']=='internal'){echo'<a class="menu" href="my-user-profile.php"><button style="height:33px;" type="button" class="btn btn-danger btn-xs">GO BACK</button></a>';} elseif($_SESSION['usertype']=='external') {echo'<a class="menu" href="user-profile.php"><button style="height:33px;" type="button" class="btn btn-danger btn-xs">GO BACK</button></a>';} ?> | <a href="logout.php"><button style="height:33px;" type="button" class="btn btn-warning btn-xs">LOGOUT</button></a>
</div>
<hr>
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
	$myreg=$_SESSION['internalregnumber'];
$sql1="SELECT * FROM eventproposals WHERE userregisnum='$myreg'";
$query1=mysqli_query($connect,$sql1);
if(mysqli_num_rows($query1)>0)
 {
 	while($row1=mysqli_fetch_assoc($query1))
 	{
    $value=$row1['eventstatus'];
    if($value==0)
    {
    	$valuesen='NOT APPROVED';
    }
    elseif($value==1)
    {
    	$valuesen='APPROVED';
    }
    echo 'You have proposed : <br>';
    echo 'EVENT NAME :<b>'.$row1['eventname'].'</b>&nbsp;&nbsp;&nbsp;&nbsp;'.'EVENT STATUS :<button type="button" style="height:40px;" class="btn btn-primary btn-xs">'.$valuesen.'</button><br>';
    echo '<hr>';
    $count++;
 	}
 }
 else{
 	echo 'You have not proposed any events. Click <a href="propose-an-event.php">HERE</a> to propose a new event.';
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