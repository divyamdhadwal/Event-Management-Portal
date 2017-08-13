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
div.radio{
	color:black;
}
</style>
</head>
<body>
<center><a href="index.php">
<img src="images/logo.png"></img></a>
<div class="introcontent" style="width:100%;">
<h2>INTERNAL REGISTRATIONS</h2>
<hr>
NOTE : <b>#This registration is mandatory . This is not event registration </b><br>
<b>#Once you register and activate your account , you can register for the events using your account portal</b><br>
#Please fill out the form using correct details and correct format as mentioned<br>#Incorrect details can lead to a permanent ban 
<hr>
<center>
<form class="form-horizontal" action="registered-internal.php" method="post">
<div class="form-group">
<div class="col-sm-4">
<?php
if(isset($_SESSION['errmsg']))
{
	echo '<h2 style="color:red;">ERROR : '.$_SESSION['errmsg'].'</h2>';
}
else
{

}
?>
<h2>First Name :</h2></div>
<div class="col-sm-7"><input type="text" class="form-control" name="first-name" placeholder="Enter your first name" required></div>
</div>
<div class="form-group">
<div class="col-sm-4">
<h2>Last Name :</h2></div>
<div class="col-sm-7"><input type="text" class="form-control" name="last-name" placeholder="Enter your last name" required></div>
</div>
<div class="form-group">
<div class="col-sm-4"><h2>Gender :</h2></div>
<div class="col-sm-7"><input type="text" class="form-control" name="gender" placeholder="FORMAT : Male/Female" required></div>
</div>
<div class="form-group">
<div class="col-sm-4"><h2>Email address :</h2></div>
<div class="col-sm-7"><input type="email" class="form-control" id="email" name="email-id" placeholder="Enter your username or email id" required></div>
</div>
<div class="form-group">
<div class="col-sm-4"><h2>Password :</h2></div>
<div class="col-sm-7">
<input type="password" class="form-control" id="pwd" name="user-password" placeholder="Choose a password" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-4"><h2>Registration Number :</h2></div>
<div class="col-sm-7">
<input type="text" class="form-control" name="regnumber" placeholder="Enter your registration number.e.g.,RA1411003030186" required></div>
</div>
<div class="form-group">
<div class="col-sm-4"><h2>Department :</h2></div>
<div class="col-sm-7">
<input type="text" name="mydept" class="form-control" placeholder="CSE/ECE/EEE/IT/Mech/Civil/Automobile" required></div><div class="col-sm-2"></div>
</div>
<div class="form-group">
<div class="col-sm-4"><h2>Year :</h2></div>
<div class="col-sm-7">
<input type="text" name="year" placeholder="Type in your year.e.g.,first/second/third/fourth">
</div>
</div>
<div class="form-group">
<div class="col-sm-4"><h2>Choose *(1 for dayscholar and 2 for hosteller) :</h2></div>
<div class="col-sm-7">
<input type="number" name="hostype" class="form-control" placeholder="format : 1/2" required></div>
</div>
<div class="form-group">
<div class="col-sm-4"><h2>Contact number :</h2></div>
<div class="col-sm-7">
<input type="number" name="contact" class="form-control" placeholder="format : +91-xxxxxxxxxx" required></div><div class="col-sm-2"></div>
</div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" value="Register" style="width:auto; height:80px;">
    </div>
  </div>
  <br>
</form>
</center>
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