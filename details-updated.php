<?php
session_start();
ob_start();
$myeventid=$_SESSION['myeventid'];
$studentid=$_SESSION['studentid'];
$newdetails = $_POST['eventdetails'];
$aboutevent = $_POST['aboutevent'];
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

$sql1="UPDATE eventdetails SET eventdetails='$newdetails' WHERE id='$myeventid'";
$query1=mysqli_query($connect,$sql1);
$sql2="UPDATE eventdetails SET aboutevent='$aboutevent' WHERE id='$myeventid'";
$query2=mysqli_query($connect,$sql2);
if($query1==1 && $query2==1)
{
header('Location:my-events.php');
}
 else{
 	die('Please wait we are working to fix this bug. Please try again tommorrow or in some time.'.mysqli_connect_error());
 }
}
mysqli_close($connect);



?>