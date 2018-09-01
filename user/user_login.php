<?php
	session_start();
	if(isset($_SESSION["USERID"]) && isset($_SESSION["USERTYPE"]))
		header("location: ../index.php");
?>
<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/user_login_design.css" >
		<center>
		<title>Login</title>
		<script type="text/javascript" src="../js/validation.js"> </script>
		
	</head>
	<body>
	<h1 style="color:#769ad3">Login</h1>
		<form action = "user_login_checking.php" method = "post"> 
			<b style="margin-right: 5px; font-size: 20px;color:White;">Username</b>
			<input type="text" style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;"  placeholder=" username..." name="username"><br><br>
			<b style="margin-right: 5px; font-size: 20px;color:White;">Password </b> 
			<input type="password" style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;"  placeholder=" password..." name="password" ><br><br>
			<input type="hidden" value ="Login" name ="loginValid">
			<input type="submit" style="width:90px; height: 35px; text-align: center;
			background-color: #636170; border-radius: 25px; font-weight: bold; color:white;border: 2px solid 
			#d2d0e2;" onclick = "return FirstValidation()" value ="Login" name ="loginButton">
			&nbsp &nbsp
			<a href = "user_registration.php" style="text-decoration: none"> 
			<b style="color:#51f77b;font-size: 20px;">Sign up</b> </a>
		</form>
		</center>
	</body>
</html>

