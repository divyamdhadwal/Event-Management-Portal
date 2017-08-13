<?php
session_start();
$_SESSION['pagenumber']=$_POST['page'];
header('Location:current-registrations-my-event.php');


?>