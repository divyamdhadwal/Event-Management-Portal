<?php
session_start();
$_SESSION['dcounter']=0;
error_reporting(E_ERROR | E_PARSE);
if($_SESSION['loggedin']==1 && ($_SESSION['usertype']=='internal'||$_SESSION['usertype']=='external'))
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
	color:white;
}
a:hover{
	color:white;
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
	background-color:#ffcf9b;
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
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideDown("slow");
    });
});
</script>
<script> 
$(document).ready(function(){
    $("#close").click(function(){
        $("#panel").slideUp("slow");
    });
});
</script>


<script> 
$(document).ready(function(){
    $("#flip1").click(function(){
        $("#panel1").slideDown("slow");
    });
});
</script>
<script> 
$(document).ready(function(){
    $("#close1").click(function(){
        $("#panel1").slideUp("slow");
    });
});
</script>
<script> 
$(document).ready(function(){
    $("#flip2").click(function(){
        $("#panel2").slideDown("slow");
    });
});
</script>
<script> 
$(document).ready(function(){
    $("#close2").click(function(){
        $("#panel2").slideUp("slow");
    });
});
</script>
<script> 
$(document).ready(function(){
    $("#flip3").click(function(){
        $("#panel3").slideDown("slow");
    });
});
</script>
<script> 
$(document).ready(function(){
    $("#close3").click(function(){
        $("#panel3").slideUp("slow");
    });
});
</script>
 
<style> 
#panel, #flip,#panel1,#panel2,#panel3,#flip1,#flip2,#flip3 {
    padding: 5px;
    text-align: center;
    background-color: #ffffff;
    border: solid 1px #c3c3c3;
}

#panel,#panel1,#panel2,#panel3 {
    padding: 50px;
    display: none;
}

#close,#close1,#close2,#close3{
font-weight:bold;
}
</style>
</head>
<body>
<?
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
$sql1="SELECT message FROM studentdetails WHERE userid='$studentid'";
$query1=mysqli_query($connect,$sql1);
if(mysqli_num_rows($query1)>0)
 {
 	while($row1=mysqli_fetch_assoc($query1))
 	{
         $mymessage=$row1['message'];
         }
 
if($mymessage==NULL)
{
$messagenumber=0;
}
else
{
$messagenumber=1;
}
}
}
mysqli_close($connect);
?>
<center><a href="index.php"><img src="images/logo.png"></img></a>
<div class="modal fade" id="quicklist-modal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<center><a class="heading"> QUICK EVENT LIST -</a> <a class="heading" style="font-family: head;">INNOVATE 2k17</a></center>
</div>
<div class="modal-body" style="text-transform: capitalize;">
<h4>CATEGORY ID : M1 | CATEGORY NAME : ONLINE EVENTS</h4><br>
EVENT ID : <b>555</b> | EVENT NAME : <b>VIEW FINDER</b><br>
<hr>
<h4>CATEGORY ID : C1 | CATEGORY NAME : ROBOTICS</h4><br>
EVENT ID : <b>1</b> | EVENT NAME : <b>ROBOWARS</b><br>
EVENT ID : <b>2</b> | EVENT NAME : <b>RANBHUMI</b><br>
EVENT ID : <b>3</b> | EVENT NAME : <b>ROBOSOCCER</b><br>
EVENT ID : <b>4</b> | EVENT NAME : <b>MAZE RUNNER</b><br>
EVENT ID : <b>5</b> | EVENT NAME : <b>ARMAGEDDON</b><br>
EVENT ID : <b>6</b> | EVENT NAME : <b>ROB THE BUILDER</b><br>
<hr>
<h4>CATEGORY ID : C2 | CATEGORY NAME : DEPARTMENTAL</h4><br>
EVENT ID : <b>222</b> | EVENT NAME : <b>ANDREDO</b><br>
EVENT ID : <b>7</b> | EVENT NAME : <b>ASSEMBLE'M UP</b><br>
EVENT ID : <b>8</b> | EVENT NAME : <b>AC/DC</b><br>
EVENT ID : <b>9</b> | EVENT NAME : <b>BRIDGE IT UP</b><br>
EVENT ID : <b>10</b> | EVENT NAME : <b>CODE JACK 5.0</b><br>
EVENT ID : <b>11</b> | EVENT NAME : <b>JUNKYARD WARS</b><br>
EVENT ID : <b>12</b> | EVENT NAME : <b>MAKE IT LARGE</b><br>
EVENT ID : <b>13</b> | EVENT NAME : <b>RUBE GOLDBERG</b><br>
EVENT ID : <b>38</b> | EVENT NAME : <b>WEBSITE WAR HOUSE</b><br>
<hr>
<h4>CATEGORY ID : C3 | CATEGORY NAME : LITERARY</h4><br>
EVENT ID : <b>14</b> | EVENT NAME : <b>ARGUE</b><br>
EVENT ID : <b>15</b> | EVENT NAME : <b>MOCKPRESS</b><br>
EVENT ID : <b>16</b> | EVENT NAME : <b>JUST A MINUTE</b><br>
EVENT ID : <b>35</b> | EVENT NAME : <b>ENGLISH-VINGLISH</b><br>
EVENT ID : <b>55</b> | EVENT NAME : <b>Pen It Down</b><br>
<hr>
<h4>CATEGORY ID : C4 | CATEGORY NAME : QUIZZICALS</h4><br>
EVENT ID : <b>17</b> | EVENT NAME : <b>TECH-O-MASTER</b><br>
EVENT ID : <b>18</b> | EVENT NAME : <b>DIG THE BRAIN</b><br>
EVENT ID : <b>39</b> | EVENT NAME : <b>QUICK BUZZZZ</b><br>
EVENT ID : <b>37</b> | EVENT NAME : <b>CHAIN REACTION</b><br>
<hr>
<h4>CATEGORY ID : C5 | CATEGORY NAME : PRESENTATION</h4><br>
EVENT ID : <b>19</b> | EVENT NAME : <b>TECH EXPO</b><br>
EVENT ID : <b>20</b> | EVENT NAME : <b>IGNITE 5.0</b><br>
EVENT ID : <b>21</b> | EVENT NAME : <b>START IT UP</b><br>
<hr>
<h4>CATEGORY ID : C6 | CATEGORY NAME : FUN</h4><br>
EVENT ID : <b>22</b> | EVENT NAME : <b>IPL AUCTION</b><br>
EVENT ID : <b>23</b> | EVENT NAME : <b>TREASURE HUNT</b><br>
EVENT ID : <b>24</b> | EVENT NAME : <b>FREAKY CIRCUTS</b><br>
EVENT ID : <b>25</b> | EVENT NAME : <b>LET'S FACE IT</b><br>
EVENT ID : <b>27</b> | EVENT NAME : <b>Who am I?</b><br>
EVENT ID : <b>28</b> | EVENT NAME : <b>FUTSAL</b><br>
EVENT ID : <b>29</b> | EVENT NAME : <b>RUBIQ</b><br>
EVENT ID : <b>40</b> | EVENT NAME : <b>HIT THE PYRAMIDS</b><br>
EVENT ID : <b>41</b> | EVENT NAME : <b>Aim On</b><br>
<hr>
<h4>CATEGORY ID : C7 | CATEGORY NAME : GUN POWDER</h4><br>
EVENT ID : <b>30</b> | EVENT NAME : <b>CS 1.6</b><br>
EVENT ID : <b>31</b> | EVENT NAME : <b>DOTA</b><br>
EVENT ID : <b>32</b> | EVENT NAME : <b>FIFA</b><br>
EVENT ID : <b>33</b> | EVENT NAME : <b>NFS</b><br>
<hr>
</div>
<div class="modal-footer">
<p class="text-left">INNOVATE , SRM Univeristy NCR CAMPUS</p>
<a style="font-size: 22px; font-weight: bold;" class="btn btn-default btn-sm" data-dismiss="modal">Close</a>
</div>
</div>
</div>
</div>
<div class="introcontent" style="width:100%;">
<div class="head" style="background-color:#CCCCCC;">
Welcome <strong><?php echo $_SESSION['username'];  ?></strong> | <span class="label label-success"><?php echo $_SESSION['userdesignation']; ?></span> | REG. ID : <strong><?php echo $_SESSION['studentid'] .' | '; ?></strong> <a href="logout.php"><button style="height:33px;" type="button" class="btn btn-warning btn-xs">LOGOUT</button></a>
<hr style="width:50%;">
</div>
<div ><p style="color:black; font-size:18px;">&nbsp;<strong></strong><img src="images/new.gif" alt="" />&nbsp;<marquee>Internal Participants must pay the registration amount on or before 11th of April 2017. All details can be accessed by scrolling down your profile or read the notice <a style="color:blue;" href=registration-notice.php">here</a> | Registrations for particular events now open  Access event id of an event from "QUICK EVENTS LIST" tab . | Change your account's password from "My Account Details" tab | Facing any technical difficulties ? Please mail us the details at administrator@innovate2k17.com</p></marquee> </div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <a style="color:#FFEE91;">Click me!</a>
<center>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
</center> 
      </button>
      <a class="navbar-brand" href="#">ACCOUNT PORTAL'S MENU :</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
      <li><a data-toggle="modal" href="#quicklist-modal">Quick Event List</a></li>
      <?php
      if($_SESSION['usertype']=='internal'){echo'<li><a href="my-account-details.php">My Account Details</a></li>';echo'<li><a href="my-inbox.php">My Inbox('.$messagenumber.')</a></li>'; } 
      elseif($_SESSION['usertype']=='external'){echo'<li><a href="account-details.php">My Account Details</a></li>';echo'<li><a href="accomodation-details.php">Apply for Accomodation</a></li>'; } 
      ?>  
      <li><a href="my-registrations-info.php">My Registration Details</a></li>
<?php if($_SESSION['userdesignation']=='EXECUTIVE'|| $_SESSION['userdesignation']=='GENERAL CHAIRPERSON' || $_SESSION['userdesignation']=='FACULTY' ) {echo'<li><a href="my-events.php">My Events</a></li>';echo '<li><a href="total-registrations.php">Total Registrations in events</a></li>'; echo '<li><a href="event-proposals.php">Check Event Proposals</a></li>';}
elseif($_SESSION['userdesignation']=='PARTICIPANT' && $_SESSION['usertype']=='internal' ){echo'<li><a href="my-events.php">My Events</a></li>';echo '<li><a href="propose-an-event.php">Propose an Event</a></li>'; echo '<li><a href="my-event-proposals.php">My Event Proposals</a></li>';}
elseif($_SESSION['userdesignation']=='EVENT-COORDINATOR'){echo'<li><a href="my-events.php">My Events</a></li>';echo '<li><a href="propose-an-event.php">Propose an event</a></li>';echo '<li><a href="my-event-proposals.php">My Event Proposals</a></li>';echo '<li><a href="current-registrations-my-event.php">Registrations in my event</a></li>';echo'<li><a href="participant-details.php">Search Participant Details</a></li>';echo '<li><a href="update-event-details.php">Update my Event Details</a></li>';echo '<li><a href="event-requirements.php">Event Requirements</a></li>';echo '<li><a href="start-my-event.php">Start Event</a></li>'; echo '<li><a href="event-close.php">Update Event Winners</a></li>';}?>
      </ul>
    </div>
  </div>
</nav>

<div style="border-color:black;border-style:solid;border-width:2px;border-radius:10px;">
<h4> Event registrations are now open. Register online by clicking "Register for an event". EVENT-ID of any event can be easily accessed using "Quick Event List". Once you have registered for an event , the details of your registration can be accessed from "My Registration Details".Each event registration has an unique "Registration ID". Visit the faculty mentioned <a style="color:#000000;" href="registration-notice.php">HERE</a> with a photocopy of your ID card. Tell your details (don't forget to tell your "Event Registration ID") , Pay the registration amount. Details of your transactions will be updated and can be accessed from "My Registration Details" whether PAID or UNPAID.</h4>
</div>
<h5>NOTE : <u>CLICK TO EXPAND THE FOLLOWING OPTIONS </u></h5>
<div id="flip">CHECK EVENT DETAILS -rules,time,place,date,event coordinator</div>
<div id="panel"><form class="form-horizontal" action="eventvalidator.php" method="post" >
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">EVENT ID :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="eventid" placeholder="Enter event's ID. Check QUICK EVENT LIST for more details"><br>
</div>
</div>
<input type="submit" value="ENQUIRE" style="font-size: 16px; background-color: white;">
</form><div id="close">Close me</div></div>

<div id="flip1">REGISTER FOR AN EVENT</div>
<div id="panel1"><form class="form-horizontal" action="eventregistration.php" method="post" >
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">EVENT ID :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="eventidforreg" placeholder="Enter event's ID to register for the event."><br>
</div>
</div>
<input type="submit" value="REGISTER" style="font-size: 16px; background-color: white;">
</form><div id="close1">Close me</div></div>


<?php if($_SESSION['userdesignation']=='EXECUTIVE' || $_SESSION['userdesignation']=='GENERAL CHAIRPERSON' ) 
{
echo'<div id="flip2">CHECK REGISTRATIONS PER EVENT</div>
<div id="panel2"><form class="form-horizontal" action="eventtrack.php" method="post" >
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">EVENT ID :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="eventtrack" placeholder="Enter EVENT ID of event you want to track"><br>
</div>
</div>
<input type="submit" value="CHECK" style="font-size: 16px; background-color: white;">
</form><div id="close2">Close me</div></div>';

echo'<div id="flip3">ASSIGN EVENT COORDINATOR</div>
<div id="panel3"><form class="form-horizontal" action="eventcoordinatorassign.php" method="post" >
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">EVENT ID :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="eventidallot" placeholder="Enter EVENT ID of event you want to allot"><br>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">COORDINATOR-1 :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="sturegno" placeholder="Enter reg no. of student *Student must be already registered"><br>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">COORDINATOR-2 :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="sturegno" placeholder="Enter reg no. of student *Student must be already registered"><br>
</div>
</div>
<input type="submit" value="ASSIGN" style="font-size: 16px; background-color: white;">
</form><div id="close3">Close me</div></div><br>';
}
elseif($_SESSION['userdesignation']=='FACULTY')
{
echo'<div id="flip2">CHECK REGISTRATIONS PER EVENT</div>
<div id="panel2"><form class="form-horizontal" action="eventtrack.php" method="post" >
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">EVENT ID :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="eventtrack" placeholder="Enter EVENT ID of event you want to track"><br>
</div>
</div>
<input type="submit" value="CHECK" style="font-size: 16px; background-color: white;">
</form><div id="close2">Close me</div></div>';

echo'<div id="flip3">ASSIGN EVENT COORDINATOR</div>
<div id="panel3"><form class="form-horizontal" action="eventcoordinatorassign.php" method="post" >
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">EVENT ID :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="eventidallot" placeholder="Enter EVENT ID of event you want to allot"><br>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">COORDINATOR-1 :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="sturegno" placeholder="Enter reg no. of student *Student must be already registered"><br>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" style="color:red;">COORDINATOR-2 :
</label>
<div class="col-sm-6"><input type="text" class="form-control" name="sturegno" placeholder="Enter reg no. of student *Student must be already registered"><br>
</div>
</div>
<input type="submit" value="ASSIGN" style="font-size: 16px; background-color: white;">
</form><div id="close3">Close me</div></div><br>';
}
?>
</div>
<br>
<p style="color:black; font-family: head; font-size: 16px;">DESIGNED by : DIVYAM DHADWAL<br>
                         Copyright &#169; 2017 INNOVATE - SRM University NCR Campus. All Rights Reserved.<br>
                         Best viewed in IE 10.x, Firefox 25.x, Chrome 30.x onwards with a Resolution of 1024 * 768 & above</p>
</center>
<script src="boot/jquery-1.11.3.min.js"></script>
<script src="boot/bootstrap.min.js"></script>

</body>
</html>