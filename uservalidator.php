<?php
session_start();
ob_start();
$_SESSION['dcounter']=0;
?>
<?php
$id=$_POST['emailid'];
$password=$_POST['password'];
$regnumber=$_POST['regno'];
$server="localhost";
$user="techzon2";
$pass="RwIKlQ#nQ";
$db="techzon2_innovateaccounts";
$connect=mysqli_connect($server,$user,$pass,$db);
if(!$connect)
{
	die('Cannot connect to the database at the time. Please try agin later'.mysqli_connect_error());
}
else{
	
$server="localhost";
$user="techzon2";
$pass="RwIKlQ#nQ";
$db="techzon2_innovateaccounts";
$connect=mysqli_connect($server,$user,$pass,$db);
if(!$connect)
{
	die('Error connecting to the database at the time'.mysqli_connect_error());
}
else{
$sql1="SELECT * FROM externalparticipants WHERE emailid='$id' AND password='$password' AND active='1'";
$query1=mysqli_query($connect,$sql1);
if(mysqli_num_rows($query1)>0)
 {
 	while($row1=mysqli_fetch_assoc($query1))
 	{
 		$_SESSION['usertype']='external';
 		$_SESSION['studentid']=$row1['id'];
 		$_SESSION['loggedin']=1;
 		$_SESSION['userdesignation']=$row1['designation'];
 		$_SESSION['username']=$row1['firstname'].'&nbsp;'.$row1['lastname'];
 		$_SESSION['numteammembers']=$row1['numteammembers'];
 		$_SESSION['nameteammembers']=$row1['nameteammembers'];
 		$_SESSION['usercontact']=$row1['contact'];

 	}
header('Location:my-user-profile.php');
 }
 else{
 	$sql2="SELECT * FROM internalparticipants WHERE emailid='$id' AND password='$password' AND active='1' AND regnumber='$regnumber'";
 	$query2=mysqli_query($connect,$sql2);
 	if(mysqli_num_rows($query2)>0)
 	{
 		while($row2=mysqli_fetch_assoc($query2))
 		{
 			$_SESSION['studentid']=$row2['id'];
 			$_SESSION['usertype']='internal';
 			$_SESSION['loggedin']=1;
 			$_SESSION['internalregnumber']=$row2['regnumber'];
 	    $_SESSION['userdesignation']=$row2['designation'];
 		$_SESSION['username']=$row2['firstname'].'&nbsp;'.$row2['lastname'];
 		$_SESSION['userdept']=$row2['department'];
 		$_SESSION['usergrade']=$row2['year'];
 		$_SESSION['usercontact']=$row2['contact'];

 		}
      header('Location:my-user-profile.php');
 	}
 	else{$_SESSION['loggedin']=0;
 		header('Location:index.php');
 	}
 }
}
mysqli_close($connect);
}
?>