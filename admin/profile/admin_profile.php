<?php
	session_start();
	if(isset($_SESSION["USERID"]) && isset($_SESSION["USERTYPE"]))
		header("location: ../index.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Sign-Up  </title>
		<script type="text/javascript" src="../js/validation.js"> </script>
	</head>
	<body>
		<center>
		<h2> Sign-Up From Here </h2>
		<form action = "user_regi_check.php" method = "POST">
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
			<select id="gender" name="gender"  > 
			<option value="NULL" selected="selected" placeholder = "Gender"></option>
			<option value="Male" >Male</option>
			<option value="Female" >Female</option>
			<option value="Other" >Other</option>

			</select> 
			 <br><br>
			 
			 <b> Date of Birth <br></b>
			<select id="day" name="day"placeholder = "DD" > 
			<option value="NULL" selected="selected"></option>
			<option value="01" >01</option>
			<option value="02" >02</option>
			<option value="03" >03</option>
			<option value="01" >04</option>
			<option value="02" >05</option>
			<option value="03" >06</option>
			<option value="01" >07</option>
			<option value="02" >08</option>
			<option value="03" >09</option>
			<option value="01" >10</option>
			<option value="02" >11</option>
			<option value="03" >12</option>
			<option value="02" >13</option>
			<option value="03" >14</option>
			<option value="01" >15</option>
			<option value="02" >16</option>
			<option value="03" >17</option>			
			<option value="02" >18</option>
			<option value="03" >19</option>
			<option value="01" >20</option>
			<option value="02" >21</option>
			<option value="03" >22</option>			
			<option value="02" >23</option>
			<option value="03" >24</option>
			<option value="01" >25</option>
			<option value="02" >26</option>
			<option value="03" >27</option>
			<option value="03" >28</option>
			<option value="01" >29</option>
			<option value="02" >30</option>
			<option value="03" >31</option>

			</select> 
			 
			 <select id="month" name="month"placeholder = "MM" >
			<option value="NULL" selected="selected"></option>
			<option value="Jan" >Jan</option>
			<option value="Feb" >Feb</option>
			<option value="Mar" >Mar</option>
			<option value="Apr" >Apr</option>
			<option value="May" >May</option>
			<option value="Jun" >Jun</option>
			<option value="July" >July</option>
			<option value="Aug" >Aug</option>
			<option value="Sep" >Sep</option>
			<option value="Oct" >Oct</option>
			<option value="Nov">Nov</option>
			<option value="Dec">Dec</option>
			
			</select> 
			
			
			<select id="year" name="year"placeholder = "YY"> 
			<option value="NULL" selected="selected"></option>
			<option value="1990" >1990</option>
			<option value="1991" >1991</option>
			<option value="1992" >1992</option>
			<option value="1993" >1993</option>
			<option value="1994" >1994</option>
			<option value="1995" >1995</option>
			<option value="1996" >1996</option>
			<option value="1997" >1997</option>
			<option value="1998" >1998</option>
			<option value="1999" >1999</option>
			<option value="2000" >2001</option>
			<option value="2002" >2002</option>
			<option value="2003" >2003</option>
			<option value="2004" >2004</option>
			<option value="2005" >2005</option>
			<option value="2006" >2006</option>
			<option value="2007" >2007</option>
			<option value="2008" >2008</option>
			<option value="2009" >2009</option>
			<option value="2010" >2010</option>
				
			</select> 
	        <br></b>
			<br>

			  
		
			
			
			<input type = "hidden" name = "registration" value = "valid" />
			<input type = "submit" onclick = "return registrationValidation()" name = "user_signup_button" value = "Sign-Up" />
			&nbsp &nbsp
			<a href = "admin_registration.php" style="text-decoration: none"> <b> Login </b> </a>
		</form>
		</center>
	</body>
</html>