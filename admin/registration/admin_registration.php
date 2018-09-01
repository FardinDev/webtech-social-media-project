<!DOCTYPE html>
<html>
	<head>
		<title> Sign-Up </title>
		<script type="text/javascript" src="../../js/validation.js"> </script>
	</head>
	<body>
		<h2> Admin SignUp Here </h2>
		<form action = "admin_regi_check.php" method = "POST">
		<b>First Name &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Last Name </b><br> 
			&nbsp
			<input type = "text"   name = "firstname" placeholder = "First Name" /> &nbsp &nbsp
			</b> <input type = "text" name = "lastname" placeholder = "Last Name" /> <br><br>
			<b>Set Username <br>
			</b> <input type = "text" name = "username" placeholder = "User Name" /> <br><br>
			<b>Set Password <br>
			</b> <input type = "password" name = "password" placeholder = "Password" /> <br><br>
			<b>Confirm Password <br>
			</b> <input type = "password" name = "repassword" placeholder = "Confirm Password" /> <br><br>
			<b>Email <br></b> <input type = "text" name = "email" placeholder = "Email" /> <br><br> 
			
			  
		    <b> Select Gender <br></b>
			<select id="gender" name="gender"> 
			<option value="NULL" selected="selected"></option>
			<option value="Male" >Male</option>
			<option value="Female" >Female</option>
			<option value="Other" >Other</option>

			</select> 
			 <br><br>
			<input type = "hidden" name = "registration" value = "valid" />
			<input type = "submit" onclick = "return registrationValidation()" name = "user_signup_button" value = "Sign-Up" />
			&nbsp &nbsp
			<a href = "../Login/admin_login.php"" style="text-decoration: none"> <b> Login </b> </a>
		</form>
		</center>
	</body>
</html>