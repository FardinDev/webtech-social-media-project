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

<script>
    var fn, ln, pas, cpas, ema, un = false;

    function check_fn(e) {
        if (e.value.length > 0) {
            fn = true;
            fn_msg.innerHTML = "Firstname is OK";
        } else {
            fn = false;
            fn_msg.innerHTML = "Firstname must be filled out";
        }
    }

    function check_ln(e) {
        if (e.value.length > 0) {
            ln = true;
            ln_msg.innerHTML = "Lastname is OK";
        } else {
            ln = false;
            ln_msg.innerHTML = "Lastname must be filled out";
        }
    }

    

    function check_pass(e) {
        if (e.value.length > 2) {
            pas = true;
            ps_msg.innerHTML = "Password is ok";
        } else {
            pas = false;
            ps_msg.innerHTML = "Password is not ok";
        }
    }

    function check_conpass(e) {
        if (e.value == document.myfm.password.value) {
            cpas = true;
            cnps_msg.innerHTML = "<div style='color:#1add31'> Matched </div>";
        } else {
            cpas = false;
            cnps_msg.innerHTML = "<div style='color:red'> Not Matched </div>";
        }
    }

    function check_email(e) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e.value)) {
            ema = true;
            eml_msg.innerHTML = "Email is OK!";
        } else {
            ema = false;
            eml_msg.innerHTML = "Invalid Email Address";
        }
    }

    function check_uname(e) {
        if (e.value.length > 3) {
            un = true;
          //  showUname();
		  showUname();
        } else {
            un = false;
            uname.msg.innerHTML = "Invalid Username";
        }
    }

    
 
 xmlhttp = new XMLHttpRequest();

        function showUname() {
            str = document.getElementById("unm").value;

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    uname_msg.innerHTML = xmlhttp.responseText;
                }
            };
            var url = "json.php?uname=" + str;
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
		
</script>

	<body style="background-color: #636170;">
		<center>
		<h1 style="color:#6ba4e0;"> Sign-Up</h1>
		<form action = "user_regi_check.php" method = "POST" style="color:white; font-size: 20px;" name="myfm">
			<b>First Name</b>
			
			<input style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;" type = "text"    placeholder = " First Name" 
			name="firstName" onkeyup="check_fn(this)">
            <a id="fn_msg"> </a>
			</b> <br> <br>
			<b>Last Name </b>
			<input style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;" type = "text"  placeholder = " Last Name" 
			name="lastName" value="" onkeyup="check_ln(this)">
            <a id="ln_msg"> </a> <br><br>
			<b>Set Username 
			</b> <input style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;" type = "text" name="uname" id="unm" value="" placeholder = " User Name" 
			onkeyup="check_uname(this)">
            <a id="uname_msg"> </a> <br><br>
			<b>Set Password 
			</b> <input type = "password"  style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;" name = "password" placeholder = " Password" 
			name="password" value="" onkeyup="check_pass(this)">
            <a id="ps_msg"> </a> <br><br>
			<b>Confirm Password 
			</b> <input type = "password" style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;"  placeholder = "Confirm Password" 
			name="confirmPassword" value="" onkeyup="check_conpass(this)">
            <a id="cnps_msg"> </a> <br><br>
			<b>Email </b> <input type = "text" style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;" name = "email" placeholder = " Email" 
			onkeyup="check_email(this)">
            <a id="eml_msg"> </a> <br><br> 
			
			  
		    <b> Select Gender </b>
			<select style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;" id="gender" name="gender"  > 
			<option value="NULL" selected="selected" placeholder = "Gender"></option>
			<option value="Male" >Male</option>
			<option value="Female" >Female</option>
			<option value="Other" >Other</option>

			</select> 
			 <br><br>
			 
			 <b> Date of Birth </b>
			<select style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;" id="day" name="day"placeholder = "DD" > 
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
			 
			 <select style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;" id="month" name="month"placeholder = "MM" >
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
			
			
			<select style="color:black; border-radius: 20px;border:2px solid 
			#979fc6;height: 25px;" id="year" name="year"placeholder = "YY"> 
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
			<input type = "submit" style="background-color: #6ba4e0;border-radius: 20px; padding:10px;
			width:90px;color:black;font-size: 15px;border:2px solid #111921; bo" onclick = "return registrationValidation()" name = "user_signup_button" value = "Sign-Up" />
			&nbsp 
			<a href = "user_login.php" style="text-decoration: none"> <b style="color:#28e25d;"> Login </b> </a>
		</form>
		</center>
	</body>
</html>