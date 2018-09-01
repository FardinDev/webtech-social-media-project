<?php
	session_start();
	if(isset($_SESSION["USERID"]) && isset($_SESSION["USERTYPE"]))
		header("location: ../index.php");
?>
<!DOCTYPE>
<html>
	<head>
		<center>
		<title>Forgot password</title>
		<script type="text/javascript" src="../js/validation.js"> </script>
	</head>
	<body>
	<h2>Enter your Email</h2>
		<form action = "forgot_password_checking.php" method = "post"> 
			<b>Email</b> <br>
			<input type="text" id = "Email" placeholder="email" name="Email"><br><br>
			
			<input type="submit" id = "SubmitBtn" onclick = "return ForgotValidation()" value ="Submit" name ="SubmitBtn">

		</form>
		</center>
	</body>
</html>