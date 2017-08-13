<?php
session_start();
$_SESSION['dcounter']=1;
$topic=$_POST['topic'];
$pastexp=$_POST['pastexp'];
$aboutme=$_POST['aboutme'];
$id=$_SESSION['internalregnumber'];
$name=$_SESSION['username'];
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
$sql1="INSERT INTO ignite(regnumber,studentname,aboutme,topic,pastexp) VALUES ('$id','$name','$aboutme','$topic','$pastexp')";
$query1=mysqli_query($connect,$sql1);
   if($query1==1)
    {
    header('Location:ignite.php');
    }
    else{
    echo 'You must enter all details';
     }
     }
mysqli_close($connect);
?>
