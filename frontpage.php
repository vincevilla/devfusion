<?php

session_start();
if(!isset($_SESSION["uid"])){
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to DEVSHOPPE</title>
	<link rel="stylesheet" href="css/style.css"/>
<body>
	
	<div class = "container">
		<video poster="	background.gif" autoplay="true">
			<source src="tech.mp4" type="video/mp4">
			<source src="tech.webm" type="video/webm">
		</video>
	<div class = "text">DEVSHOPPE</div>
	<p>Your one stop online shop</p>
	<div class = "text1"><a href="profile.php">Click Here to proceed >></a></div>
	</div>
</body>
</html>