<!DOCTYPE>
<html>
	<head>
		<title>Login</title>
		<script type="text/javascript" src="../../js/validation.js"> </script>
	</head>
	<body>
		<h2> Admin Login Here </h2>
		<form action = "admin_login_checking.php" method = "post"> 
			Enter Your Username or Email &nbsp <input type="text" id="username" placeholder="Username or Email" name="username"><br><br>
			Enter Your Password &nbsp <input type="password" id="password" placeholder="Password" name="password" ><br><br>
			<input type = "hidden" name="loginValid" value = "valid" />
			<input type="submit" onclick = "return loginValidation()" value ="Login" name ="loginButton">
			<a href = "../registration/admin_registration.php"> Sign up </a>
		</form>
	</body>
</html>

