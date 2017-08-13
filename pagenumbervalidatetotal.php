<?php
session_start();
$_SESSION['totalpagenumber']=$_POST['page'];
header('Location:total-registrations.php');


?>