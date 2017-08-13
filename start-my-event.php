<?php
session_start();
ob_start();
if(isset($_SESSION['databasecreated'])&& $_SESSION['databasecreated']==1)
{
header('Location:add-participants.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>INNOVATE 2k17</title>
<style>
@font-face {
    font-family: head;
    src: url(Pompiere-Regular.ttf);
}
body{
padding-top:20px;
paddting-left:20px;
padding-right:20px;
font-family:head;
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
</style>
</head>
<body>
<div style="background-color:#4DBFDE;padding:20px;">
<h1>DO YOU WISH TO CONTINUE ?</h1>
</div>
<br>
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
$sql1="SELECT * FROM eventdetails WHERE userid1='$studentid' OR userid2='$studentid' OR userid3='$studentid'";
$query1=mysqli_query($connect,$sql1);
if(mysqli_num_rows($query1)>0)
 {
 	while($row1=mysqli_fetch_assoc($query1))
 	{
         echo '<h3>EVENT NAME : <b><a style="color:green;">'.$row1['eventname'].'</a></b>&nbsp;&nbsp;&nbsp;EVENT ID : <b><a style="color:green;">'.$row1['id'].'</a></b></h3>';
        }
 }
}
mysqli_close($connect);
?>
<br>
<a style="color:red"><b>NOTE : </b> You can't undo these changes. Make sure you proceed at the right time. </a><br>
<br>
<a class="button" href="start-event.php"> YES </a>&nbsp;&nbsp;&nbsp;<a class="button" href="my-user-profile.php"> NO </a>
<br>
<center>
<hr style="width:60%;">
<p style="color:black; font-family: head; font-size: 16px;">DESIGNED by : DIVYAM DHADWAL<br>
                         Copyright &#169; 2017 INNOVATE - SRM University NCR Campus. All Rights Reserved.<br>
                         Best viewed in IE 10.x, Firefox 25.x, Chrome 30.x onwards with a Resolution of 1024 * 768 & above</p>
</center>
<script src="boot/jquery-1.11.3.min.js"></script>
<script src="boot/bootstrap.min.js"></script>

</body>
</html>