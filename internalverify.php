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
<?php
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
             
if(isset($_GET['id']) && !empty($_GET['id']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_escape_string($_GET['ei']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                 
    $search = mysqli_query("SELECT emailid, hash, active FROM internalparticipants WHERE emailid='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
        mysql_query("UPDATE internalparticipants SET active='1' WHERE emailid='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        echo '<h2>Your account has been activated, you can now login</h2>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<h2>The url is either invalid or you already have activated your account.</h2>';
    }
                 
}else{
    // Invalid approach
    echo '<h2>Invalid approach, please use the link that has been send to your email.</h2>';
}
?>
</div>
<script src="boot/jquery-1.11.3.min.js"></script>
<script src="boot/bootstrap.min.js"></script>
</center>
</body>
</html>