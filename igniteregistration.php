<?php
session_start();
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
input[type=email]{
	background-color:#C0C0C0;
	color:black;
	font-size:22px;
font-family:head;
}
input[type=password],input[type=submit]{
	background-color:#C0C0C0;
	color:black;
	font-size:22px;
font-family:head;
}
input[type=number]{
	background-color:#C0C0C0;
	color:black;
	font-size:26px;
font-family:head;
}
input[type=text]{
	background-color:#C0C0C0;
	color:black;
	font-size:22px;
font-family:head;
}

body{
font-family:head;
background-color:#9EB6F1;
}
</style>
</head>
<body>
<p style="color:red; font-size:28px;">IGNITE REGISTRATION - INNOVATE 2k17 </p>
<hr>
<form action="igniteregistered.php" method="post">
ABOUT YOU* : <input type="text" name="aboutme" placeholder="Be as brief as you can" required><br>
<br>
TOPIC OF PRESENTATION* : <input type="text" name="topic" required><br>
<br>
PREVIOUS PUBLIC SPEAKING EXPERIENCES* (if any): <input type="text" name="pastexp" required><br>
<input type="submit" value="Register">
</form>
</body>
</html>